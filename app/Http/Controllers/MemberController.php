<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Mentor;
use App\Models\Division;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index(){
       
        $members = Member::all();
        $division = Division::select('id','name')->get();
        $mentors = Mentor::select('id','name')->get();        
        return view('peserta.create',compact('division','mentors','members'));
    }

    public function read(){
       
        $members = Member::all();
        $division = Division::select('id','name')->get();
        $mentors = Mentor::select('id','name')->get();        
        return view('peserta.read',compact('division','mentors','members'));
    }

    
    
    public function storeDataPost(Request $request)
    {                
        $validated = $request->validate([            
            'mentors_id'=>'required',
            'divisions_id'=>'required',
            'start'=>'required',
            'end'=>'required',
            'name'=>'required',
            'nikp'=>'required',
            'univ'=>'required',
            'email'=>'required',
            'description'=>'required',
            'phone'=>'required',
            'cv'=>'required',
            'internship_letter'=>'required'            
        ]);
        $namecv = $request->file('file')->getClientOriginalName();
        $nameinternletter =  $request->file('file')->getClientOriginalName();          
        $pathcv = $request->file('cv')->store('public/files/cv');
        $pathinternletter = $request->file('internship_letter')->store('public/files/internletter');
        
        $addMember = new Member([                
            'mentors_id'=>$request->get('name'),
            'divisions_id'=>$request->get('divisions_id'),
            'start'=>$request->get('start'),
            'end'=>$request->get('end'),
            'name'=>$request->get('name'),
            'nikp'=>$request->get('nikp'),
            'univ'=>$request->get('univ'),
            'email'=>$request->get('email'),
            'description'=>$request->get('description'),
            'phone'=>$request->get('phone'),
            'cv'=>$namecv,            
            'internship_letter'=>$nameinternletter
        ]);
                
        $addMember->path = $pathcv;
        $addMember->path = $pathinternletter;

        $addMember->save();
        return redirect('/createdivision')->with('status', 'File Has been uploaded successfully in laravel 8');

        }  

        public function edit($id) {  
            $members = Member::findOrFail($id); 
            $divisions = Division::select('id','name')->post();
            $mentor = Mentor::select('id','name')->post();       
            return view('peserta.edit',[
                'members' => $members,
            ]);
        }
    
        public function update(Request $request, Member $members)
        {
            $request->validate([          
                'mentors_id'=>'required',
                'divisions_id'=>'required',
                'start'=>'required',
                'end'=>'required',
                'name'=>'required',
                'nikp'=>'required',
                'univ'=>'required',
                'email'=>'required',
                'description'=>'required',
                'phone'=>'required',
                'cv'=>'required',
                'internship_letter'=>'required'                                       
            ]);      
    
            $validator = Validator::make($request->all(), [
                'name' => $request->name,
                'mentors_id'=>$request->mentors_id,
                'divisions_id'=>$request->divisions_id,
                'start'=>$request->start,
                'end'=>$request->end,
                'name'=>$request->name,
                'nikp'=>$request->nikp,
                'univ'=>$request->univ,
                'email'=>$request->email,
                'description'=>$request->description,
                'phone'=>$request->phone,
                'cv'=>$request->cv,
                'internship_letter'=>$request->internship_letter             
            ]);
    
            $input = $request->all();
            $members->update($input);
            return redirect('/createmember');
    
        }
}