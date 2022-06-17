<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{

    public function index()
    {
        $divisions = Division::all();
        return view('division.create')->with('divisions', $divisions);
    }

    public function storeDataPost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);


        $addDiv = new Division([
            'name' => $request->get('name'),
        ]);

        $addDiv->save();
        return redirect('/createdivision');
    }

    public function delete($id)
    {
        Division::find($id)->delete();
        return redirect('/createdivision');
    }

    public function edit($id)
    {
        $division = Division::findOrFail($id);
        return view('division.edit', [
            'divisions' => $division,
        ]);
    }

    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'name' => $request->name,
        ]);


        $input = $request->all();
        $division->update($input);
        return redirect('/createdivision');
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
