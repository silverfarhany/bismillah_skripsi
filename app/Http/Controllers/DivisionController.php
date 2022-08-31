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
}
