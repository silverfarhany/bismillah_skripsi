<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Member;
use App\Models\Mentor;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function CreateTask(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'deadline' => 'required',
            'description' => 'required',
            'status' => 'required',                       
        ]);
        
        $name = $request->name;
        $deadline = $request->deadline;
        $description = $request->description;
        $status = 'cerated';       

        $addTask = new Task([    
            'member_id' => $request->member_id,
            'mentor_id' => $request->mentor_id,
            'name' => $name,
            'deadline' => $deadline,
            'description' => $description,
            'status' => $status,            
        ]);

        $addTask->save();
        return redirect('/readtask');

        }

    public function showTask(Request $request)
    {
        if(Session::get('role') == 2){
            $task = Task::all();
            $member = Member::select('id','name')->get();
            $mentor = Mentor::select('id','name')->get();
            return view('showTask',[
                'tasks' => $task,
                'members' => $member,
                'mentors' => $mentor
            ]);
        }elseif(Session::get('role') == 1){
            return redirect('/homepeserta');
        }else{
            return view('login');
        }
    }
}
