<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Division;
use App\Models\Member;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index(){
       
        $division = Division::select('id','name')->get();
        $mentors = Mentor::all();
        $members = Member::select('id','name')->get();
        return view('pembimbing.create',compact('division','mentors','members'));
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

    public function delete($id)
    {
        Mentor::find($id)->delete();
        return redirect('/creatementor');
    }

    public function edit($id) {   
        $mentors = Mentor::findOrFail($id);
        $members = Member::select('id','name')->get();
        $divisions = Division::select('id','name')->get();
        // dd($tasks);          
        return view('pembimbing.edit',[                        
            'members' => $members,            
            'divisions' => $divisions,
            'mentors' => $mentors    
        ]);
    }

    public function update(Request $request, Mentor $mentor)
    {
        
        $request->validate([                      
            'divisions_id'=>'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);      
        

        $divisions_id = $request->divisions_id;         
        $name = $request->name;  
        $email= $request->email; 
        $phone = $request->phone;
        
        
        $updateMentor = [                      
            'divisions_id' => $divisions_id,                      
            'name' => $name,
            'email' => $email, 
            'phone' => $phone,                         
        ];
      
            // dd($updateTask);
        Mentor::where('id',$request->id_mentor)->update($updateMentor); 
        // dd($updateTask);           
        return redirect('/creatementor');

    }
}
