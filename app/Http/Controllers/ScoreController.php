<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Member;
use App\Models\Division;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(){
        $divisions = Division::select('id','name')->get();
        $members = Member::select('id','name')->get();
        $tasks = Task::select('id','name')->get();
        return view('score.create',compact('tasks','members','divisions'));
    }

    public function CreateScore(Request $request)
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
}
