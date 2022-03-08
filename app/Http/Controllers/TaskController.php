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
        return view('task.readall',compact('tasks','members'));
    }

    public function CreateTask(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'members_id'=>'required',
            'deadline' => 'required',
            'description' => 'required',                                   
        ]);
        //$mentor_id = Member::where('id',$request->members_id)->select('mentors_id')->first(); // << hasil disini
        
        $name = $request->name;
        $members_id = $request->members_id;
        $mentors_id = $request->session()->get('id'); // get mentors id
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

    public function edit($id) {   
        $tasks = Task::findOrFail($id);
        $members = Member::select('id','name')->get();
        // dd($tasks);          
        return view('task.edit',[                        
            'members' => $members,            
            'tasks' => $tasks,    
        ]);
    }

    public function update(Request $request, Task $task)
    {
        
        $request->validate([                      
            'members_id'=>'required',
            'name' => 'required',
            'deadline' => 'required',
            'description' => 'required'
        ]);      
        //  dd($request);

        $members_id = $request->members_id; 
        $mentors_id = $request->session()->get('id');    
        $tasks_name = $request->tasks_name;  
        $deadline= $request->deadline; 
        $description = $request->description;
        $status = '1';  
        
        $updateTask = [                      
            'members_id' => $members_id, 
            'mentors_id' => $mentors_id,           
            'name' => $tasks_name,
            'deadline' => $deadline, 
            'description' => $description,
            'status' => $status,               
        ];
      
            // dd($updateTask);
        Task::where('id',$request->id_task)->update($updateTask); 
        dd($updateTask);           
        return redirect('/readalltask');

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
