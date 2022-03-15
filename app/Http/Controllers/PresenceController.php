<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index(){
        $members = Member::select('id','name')->get();    
        return view('member.index', compact('members'));
    }

    public function submit(Request $request)
    {
        $proof_name = $request->proof->getClientOriginalName();
        $request->proof->storeAs('public/files/proof', $proof_name);
        $request->validate([
            'members_id'=>'required',
            'date'=>'required',
            'end' => 'required',                                   
            'activity' => 'required',
            'proof' => 'required|mimes:txt,xlx,xls,pdf,jpg,png'
        ]);
        
        $proof_name = $request->proof->getClientOriginalName();
        // $request->proof->storeAs('public/files/proof', $proof_name);

        $members_id = $request->session()->get('id');;        
        $date = $request->Carbon::now()->format('Y-m-d');
        $end = $request->Carbon::now()->format('H:i:m');
        $activity = $request->activity;
        $proof = $request->proof->storeAs('public/files/proof', $proof_name);                          

        dd($request->$proof);
        $submitPresence = new Presence([    
            'members_id' => $members_id,            
            'date' => $date,
            'end' => $end,
            'activity' => $activity,
            'proof' => $proof,            
        ]);
        
        dd($submitPresence);
        $submitPresence->save();
        return redirect('/homepeserta');

    }
}
