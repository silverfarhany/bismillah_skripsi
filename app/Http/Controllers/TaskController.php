<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\TaskFile;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('mentors_id', $request->session()->get('id'))->get();
        return view('task.readall', compact('tasks'));
    }

    public function create()
    {
        $members = Member::where('is_aktif', '1')->where('mentors_id', Mentor::where('email', auth()->user()->email)->first()->id)->get();
        return view('task.create', compact('members'));
    }

    public function CreateTask(Request $request)
    {
        $request->validate([
            'members_id' => 'required',
            'task_name' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        //$mentor_id = Member::where('id',$request->members_id)->select('mentors_id')->first(); // << hasil disini

        $members_id = $request->members_id;
        $mentors_id = $request->session()->get('id'); // get mentors id
        $name = $request->task_name;
        $deadline = $request->deadline;
        $description = $request->description;
        $status = '1';
        $addTask = new Task([
            'members_id' => $members_id,
            'mentors_id' => $mentors_id,
            'name' => $name,
            'deadline' => $deadline,
            'description' => $description,
            'status' => $status,
        ]);
        // $mentors_id = session('mentors_id', '2');

        $addTask->save();
        return redirect('/home')->with('success', 'Data Tugas berhasil dibuat');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        return redirect('/alldata')->with('success', 'Data Tugas berhasil dihapus');
    }

    public function edit(Task $id)
    {
        $task = $id->load('getMember');
        // // dd($tasks);          
        return view('task.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        $id->update($request->all());

        return redirect('/alldata')->with('success', 'Data Tugas berhasil diupdate');
        // $updateTask = [                      
        // 'members_id' => $members_id, 
        //     'mentors_id' => $mentors_id,           
        //     'name' => $tasks_name,
        //     'deadline' => $deadline, 
        //     'description' => $description,
        //     'status' => $status,               
        // ];

        //     dd($task);
        // Task::where('id',$request->id_task)->update($task);       
        // return redirect('/readalltask');
        // }
    }

    public function read()
    {
        if (Session::get('roll') == 2) {
            $data_member = Member::where('id', Session::get('id'))->first();
            // $data_mentor = Mentor::where('members_id',Session::get('members_id'))->first();                
            $data_tasks = Task::with('getMentor')->where('members_id', $data_member->id)->get();
            return view('task.read', [
                'members' => $data_member,
                // 'mentors' => $data_mentor,
                'tasks' => $data_tasks
            ]);
        } elseif (Session::get('roll') != 2) {
            return redirect('/home');
        } else {
            return view('/login');
        }
    }

    public function getMemberTask(Member $id)
    {

        $data = [];
        $member = $id->load('getTask', 'getTask.getFile');
        foreach ($member->getTask as $task) {
            $status = null;
            if ($task->status == 1) {
                $status = "Not Submitted";
            } else if ($task->status == 2) {
                $status = "Pending";
            } else if ($task->status == 3) {
                $status = "Revision";
            } else if ($task->status == 4) {
                $status = "Approved";
            }
            $listFile = [];
            foreach ($task->getFile as $file) {
                $listFile[] = [
                    'file' => $file->file,
                ];
            }
            $data[] = [
                'id' => $task->id,
                'name' => $task->name,
                'deadline' => date('d F Y', strtotime($task->deadline)),
                'description' => $task->description,
                'status' => $status,
                'submission' => $listFile,
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function getNotSubmmitedTask()
    {
        $data_member = Member::where('id', Session::get('id'))->first();
        $tasks = Task::with('getMentor')->where('members_id', $data_member->id)->where('status', 1)->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function submitTask(Task $id)
    {
        if ($id->status == 4) {
            abort('404');
        }
        $task = $id->load('getFile');
        $jumlahFile = $id->getFile->count();
        return view('task.submitTask', compact('task', 'jumlahFile'));
    }

    public function storeSubmitTask(Task $id, Request $request)
    {
        $file = $request->file('file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalName . '_' . time() . "." . $file->extension();
        TaskFile::create([
            'tasks_id' => $id->id,
            'file' => $fileName,
            'upload_date' => date('Y-m-d H:i:s')
        ]);
        $id->update([
            'status' => '2'
        ]);
        $file->move(public_path('file/task_file'), $fileName);
        return response()->json(['success' => $fileName]);
    }

    public function ApproveTask(Task $id)
    {
        $id->update([
            'status' => 4
        ]);

        return back()->with('success', 'Tugas berhasil diapprove');
    }

    public function RevisionTask(Task $id, Request $request)
    {
        $request->validate([
            'reason' => 'required'
        ]);
        $id->update([
            'status' => 3,
            'revision_note' => $request->reason,
        ]);

        return back()->with('success', 'Task berhasil ditolak');
    }

    public function getTaskFile(Task $id, Request $request)
    {
        $data = [];
        $files = $id->load('getFile');
        foreach ($files->getFile as $file) {
            $data[] = [
                'file' => $file->file,
                'upload_date' => date('d F Y (H:i)', strtotime($file->upload_date))
            ];
        }
        return response()->json(['files' => $data]);
    }

    public function deleteFile(TaskFile $id)
    {
        $id->load('Task');
        if (!empty($id->file)) {
            unlink(public_path('file/task_file') . '/' . $id->file);
        }
        $id->delete();
        $checkFile = TaskFile::where('tasks_id', $id->tasks_id)->count();
        if ($checkFile == 0) {
            $id->Task->update([
                'status' => '1'
            ]);
        }
        return back();
    }

    public function export(Request $request)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required'
        ]);
        $spreadsheet = IOFactory::load('file/excel_template/Data-Tugas.xlsx');
        foreach (range('A', 'H') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        if (auth()->user()->role == '3') {
            $tasks = Task::with('getMember', 'getFile')->where('created_at', '>=', date('Y-m-d 00:00:00',strtotime($request->start)))->where('created_at', '<=', date('Y-m-d 23:59:59',strtotime($request->end)))->orderBy('created_at')->get();
        } else {
            $tasks = Task::with('getMember', 'getFile')->whereHas('getMember', function ($query) {
                $query->where('mentors_id', session()->get('id'));
            })->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->orderBy('created_at')->get();
        }

        $row = 3;
        $no = 1;
        foreach ($tasks as $task) {
            switch ($task->status) {
                case 1:
                    $status = "Not Submitted";
                    break;
                case 2:
                    $status = "Pending";
                    break;
                case 3:
                    $status = "Revision";
                    break;
                case 4:
                    $status = "Approved";
                    break;
                default:
                    $status = "Not Submitted";
                    break;
            }
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("A{$row}", "{$no}");
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("B{$row}", $task->name);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("C{$row}", date('d F Y', strtotime($task->created_at)));
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("D{$row}", date('d F Y', strtotime($task->deadline)));
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("E{$row}", $task->getMember->name);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("F{$row}", $status);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("H{$row}", date('d F Y H:i:s', strtotime($task->updated_at)));
            if(count($task->getFile) == 0){
                $spreadsheet->setActiveSheetIndex(0)->setCellValue("G{$row}", "-");
                $row++;
            }else{
                foreach ($task->getFile as $file) {
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue("G{$row}", $file->file);
                    $spreadsheet->getActiveSheet()->getCell("G{$row}")->getHyperlink()->setUrl(URL::to('/file/task_file/'.$file->file));
                    $row++;
                }
            }
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=Reports Tugas_" . date('Y-m-d', strtotime($request->start)) . '_to_' . date('Y-m-d', strtotime($request->end)) . ".xlsx");
        $writer->save('php://output');
    }
}
