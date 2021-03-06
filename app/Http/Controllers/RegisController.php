<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Member;
//use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    public function regis()
    {
        if (Session::get('roll') == 2) {
            return redirect('/homepeserta');
        } elseif (Session::get('roll') == 1) {
            return redirect('/home');
        } else {
            return view('regis');
        }
    }

    public function actionregis(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $checkUser = User::where('email', $request->email)->count();
        if ($checkUser > 0) {
            return back()->with('EmailUsed', 'Eamil already Registered');
        }

        $user_id = null;
        $user_role = 0;
        if ($user_id = Mentor::where('email', $validated['email'])->select('id','is_hr')->first()){
            $user_role = $user_id->is_hr == 1 ? 3 : 1;
        } 
        elseif ($user_id = Member::where('email', $validated['email'])->where('is_aktif', 1)->select('id')->first()) {
            $user_role = 2;
        }
        else {
            return back()->with('khususEmail', 'The selected email is invalid.');
        }

        //$user_id = User::where('email',$request->email)->select('id')->first();
        $data = new User([
            'name' => $request->get('fullname'),
            'email' => $request->get('email'),
            'password' => hash::make($request->get('password')),
            'role' => $user_role,
        ]);

        $data->save();
        return back()->with('loginRegister', 'Register Succes! You can LogIn Now');
    }
}
