<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use App\Models\Member;
use App\Models\Mentor;
use Illuminate\Http\Request;
//use App\Http\Controllers\HomeController;

class HomeController extends Controller
{
        public function home()
        { 
            if(Session::get('roll') == 2){
                $member = Member::all();
                return view('peserta.index')->with('members', $member);
            }elseif(Session::get('roll') == 1){
                $mentor = Mentor::all()->first();
                $members = Member::select('id','name')->get();
                $tasks = Task::all();
                return view('pembimbing.index')->with(compact('mentor','members','tasks'));                
            }else{
                return view('login');
            }

            // $members = Member::select('id','name')->get();
            // $tasks = Task::all();
            // return view('pembimbing.index', compact('tasks','members'));
        }
}
