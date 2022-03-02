<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Point;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScoreController extends Controller
{
    public function index(){
        $mentors = Mentor::select('id','name')->get();
        $members = Member::select('id','name')->get();
        $tasks = Task::select('id','name')->get();
        // $points = Point::all();
        return view('score.create',compact('tasks','members','mentors'));
    }

    public function read(){
        $mentors = Mentor::select('id','name')->get();
        $members = Member::select('id','name')->get();
        $tasks = Task::select('id','name')->get();
        $points = Point::all();
        return view('score.read',compact('tasks','members','mentors','points'));
    }

    public function CreateScore(Request $request)
    {
        $request->validate([
            'mentors_id'=>'required',
            'members_id'=>'required',
            'tasks_id' => 'required',
            'point' => 'required',                                   
        ]);
                               

        $addScore = Point::create([    
            'mentors_id' => $request->get('mentors_id'),
            'members_id' => $request->get('members_id'),            
            'tasks_id' => $request->get('tasks_id'),
            'point' => $request->get('point'),            
        ]);

        $addScore->save();
        return redirect('/createscore')->with('success','Data Berhasil ditambahkan');

    }

    public function delete($id)
    {
        Point::find($id)->delete();
        return redirect('/readscore');
    }

    public function edit($id) {
        $points = Point::findOrFail($id);  
        $mentors = Mentor::select('id','name')->get();
        $members = Member::select('id','name')->get();
        $task = Task::select('id','name')->get();
        // dd($points);              
        return view('score.edit',[                        
            'members' => $members,
            'mentors' => $mentors,
            'task' => $task,
            'points' => $points,
        ]);
    }

    public function update(Request $request, Point $point)
    {
        // dd($request);
        $request->validate([          
            'mentors_id'=>'required',
            'members_id'=>'required',
            'tasks_id' => 'required',
            'point' => 'required',                                      
        ]);      

        $members_id = $request->members_id;
        $mentors_id = $request->mentors_id;
        $tasks_id = $request->tasks_id;
        $point = $request->point;
        
        $updateScore = [           
            'mentors_id' => $mentors_id,
            'members_id' => $members_id,            
            'tasks_id' => $tasks_id,
            'point' => $point,            
        ];
        // dd($updateScore);
        // dd($request);
        Point::where('id',$request->id_point)->update($updateScore);   
        // dd(Point::where('id',$request->id));     
        return redirect('/readscore');

    }
}
