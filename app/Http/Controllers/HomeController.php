<?php

namespace App\Http\Controllers;

use Session;
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
                $mentor = Mentor::all();
                return view('pembimbing.index')->with('mentors', $mentor);
            }else{
                return view('login');
            }
        }
}
