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
        $request->validate([
            'members_id'=>'required',
            'date'=>'required',
            'end' => 'required',                                   
            'activity' => 'required',
            'proof' => 'required'
        ]);
        
        
        $members_id = $request->session()->get('id');;        
        $date = $request->Carbon::now()->format('Y-m-d');
        $end = $request->Carbon::now()->format('H:i:m');
        $activity = $request->activity;
        $proof = $request->file('proof')->getClientOriginalName();              

        $submitPresence = new Presence([    
            'members_id' => $members_id,            
            'date' => $date,
            'end' => $end,
            'activity' => $activity,
            'proof' => $proof,            
        ]);
        

        $submitPresence->save();
        return redirect('/homepeserta');

    }
}
