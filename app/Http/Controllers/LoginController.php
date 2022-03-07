<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if(Session::get('roll') == 2){
            return redirect('/homepeserta');
        }elseif(Session::get('roll') == 1){
            return redirect('/home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {   
        $login = $request->validate([
            'email' => 'required|email:dns|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($login)) {

            $request->session()->regenerate();

            $user_id = null;
            if($user_id = Mentor::where('email', $login['email'])->select('id')->first());
            elseif($user_id = Member::where('email', $login['email'])->select('id')->first());

            // $mentor_id = Mentor::where('email',$request->email)->select('id')->first();
            // $request->session()->put('id_mentor', $mentor_id->id); 
            $session_id_roll = User::where('email',$request->email)->select('role','name')->first();
            $request->session()->put('roll', $session_id_roll->role);
            $request->session()->put('id', $user_id);
            $request->session()->put('name', $session_id_roll->name);
            $request->session()->put('mentors_id', $session_id_roll->mentors_id);
            $request->session()->put('members_id', $session_id_roll->members_id);

            if(Session::get('roll') == 2){
                return redirect()->intended('/homepeserta');
            }else{
                return redirect()->intended('/home');
            }
        }
        return back()->with('loginRegister','Login Failed!');
    }
 
    public function actionlogout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');   
    }
};