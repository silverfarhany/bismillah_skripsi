<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use App\Models\Member;
use App\Models\Mentor;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $members = Member::select('id','name')->get();
        $tasks = Task::all();
        return view('task.readall', compact('tasks','members'));
    }

    public function CreateTask(Request $request)
    {
        $request->validate([
            'members_id'=>'required',
            'name'=>'required',
            'description' => 'required',                                   
            'deadline' => 'required'
        ]);
        //$mentor_id = Member::where('id',$request->members_id)->select('mentors_id')->first(); // << hasil disini
        
        $members_id = $request->members_id;
        $mentors_id = $request->session()->get('id'); // get mentors id
        $name = $request->name;
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
        return redirect('/readalltask');

        }

    public function delete($id)
    {
        Task::find($id)->delete();
        return redirect('/readalltask');
    }

    public function edit(Task $tasks, $id) {   
        $tasks = Task::find($id);
        $members = Member::select('id','name')->get();
        // // dd($tasks);          
        return view('task.edit',[                        
            'members' => $members,            
            'tasks' => $tasks,    
        ]);
        
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [                      
            'members_id'=>'required',
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);      
        
        $task = Task::find($id);
        $task->members_id = $request->input('members_id'); 
        $task->name = $request->input('name');  
        $task->mentors_id = $request->session()->get('id');    
        $task->description = $request->input('description');  
        $task->deadline= $request->date('deadline'); 
        $task->update();

        return redirect('/readalltask');
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
         
        public function read(Task $task, $id)
        {
            if(Session::get('roll') != 1){
                $data_member = Member::where('id',Session::get('id'))->first();
                // $data_mentor = Mentor::where('members_id',Session::get('members_id'))->first();                
                $data_tasks = $task->find($id);
                
                return view('task.read',[
                    'members' => $data_member,
                    // 'mentors' => $data_mentor,
                    'tasks' => $data_tasks
                ]);
               
            }elseif(Session::get('roll') != 2){
                return redirect('/home');
            }else{
                return view('/login');
            } 
    }
}
