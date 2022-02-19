<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Division;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index(){
       
        $division = Division::select('id','name')->get();
        return view('pembimbing.create',compact('division'));
    }

    public function storeDataPost(Request $request)
    {      
        // dd($addMentor);          
        $validated = $request->validate([
            'divisions_id'=>'required',
            'name'=>'required|max:255',    
            'email'=>'required|unique:mentors',
            'phone'=>'required|max:15'                               
        ]);
                   

        $addMentor = Mentor::create([    
            'divisions_id' => $request->get('divisions_id'),
            'name' => $request->get('name'),    
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        // dd($addMentor);
        $addMentor->save();    
        return redirect('/creatementor')->with('success','Data Berhasil ditambahkan');        
        }
}
