<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Member;
use App\Models\Mentor;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $members = Member::select('id','name')->get();
        $tasks = Task::all();
        return view('task.readall',compact('tasks','members'));
    }

    // public function read(){
       
    //     // $members = Member::all();        
    //     // $mentors = Mentor::select('id','name')->get();        
    //     return view('task.readall',compact('mentors','members'));
    // }

    public function CreateTask(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'members_id'=>'required',
            'deadline' => 'required',
            'description' => 'required',                                   
        ]);
        
        
        $name = $request->name;
        $members_id = $request->members_id;
        $mentors_id = '2';
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

        $addTask->save();
        return redirect('/readalltask');

        }

    // public function showTask(Request $request)
    // {
    //     if(Session::get('role') == 2){
    //         $task = Task::all();
    //         $member = Member::select('id','name')->get();
    //         $mentor = Mentor::select('id','name')->get();
    //         return view('showTask',[
    //             'tasks' => $task,
    //             'members' => $member,
    //             'mentors' => $mentor
    //         ]);
    //     }elseif(Session::get('role') == 1){
    //         return redirect('/homepeserta');
    //     }else{
    //         return view('login');
    //     }
    // }
}
