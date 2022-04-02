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
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($login)) {

            $request->session()->regenerate();

            $user_all = null;
            if($user_all = Mentor::where('email', $login['email'])->select('id','divisions_id')->first());
            elseif($user_all = Member::where('email', $login['email'])->select('id','mentors_id', 'divisions_id')->first()){
                $request->session()->put('mentors_id', $user_all->mentors_id); 
            }

            $user_id_roll_name = User::where('email',$request->email)->select('id','role','name')->first();
            $request->session()->put('roll', $user_id_roll_name->role);
            $request->session()->put('id', $user_all->id);
            $request->session()->put('name', $user_id_roll_name->name);
            $request->session()->put('divisions_id', $user_all->divisions_id);

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