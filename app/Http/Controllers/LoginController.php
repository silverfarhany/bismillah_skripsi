<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Member;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        if (Session::get('roll') == 2) {
            return redirect('/homepeserta');
        } elseif (Session::get('roll') == 1 || Session::get('roll') == 3) {
            return redirect('/home');
        } else {
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
            if ($user_all = Mentor::where('email', $login['email'])->select('id', 'divisions_id')->first());
            elseif ($user_all = Member::where('email', $login['email'])->select('id', 'mentors_id', 'divisions_id')->first()) {
                $request->session()->put('mentors_id', $user_all->mentors_id);
            }

            $user_id_roll_name = User::where('email', $request->email)->select('id', 'role', 'name')->first();
            $request->session()->put('roll', $user_id_roll_name->role);
            $request->session()->put('id', $user_all->id);
            $request->session()->put('name', $user_id_roll_name->name);
            $request->session()->put('divisions_id', $user_all->divisions_id);

            if (Session::get('roll') == 2) {
                return redirect()->intended('/homepeserta');
            } else {
                return redirect()->intended('/home');
            }
        }
        return back()->with('loginRegister', 'Login Failed!');
    }

    public function actionlogout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function editProfile(){
        if(Auth::User()->role == '2'){
            return view('peserta.editAkun');
        }
        else if(Auth::User()->role == '1' || Auth::User()->role == '3'){
            return view('pembimbing.editAkun');
        }
    }

    public function updateProfile(Request $request, User $id){
        $request->validate([
            'name'=>'required',
            'password'=>'confirmed'
        ]);
        if($request->password_lama != '' && $request->password == ''){
            return back()->with('error','Isi Password Baru');
        }
        if($request->password_lama == '' && $request->password != ''){
            return back()->with('error','Isi Password Lama');
        }

        if($request->password_lama != '' && $request->password != ''){
            if(Hash::check($request->password_lama, $id->password)){
                    $id->update([
                        'password'=>bcrypt($request->password)
                    ]);
            }else{
                return back()->with('error','Password Lama tidak sesuai');
            }
        }
        $id->update([
            'name'=>$request->name
        ]);
        if(Auth::User()->role == '2'){
            $member = Member::where('email',$id->email)->first();
            $member->update([
                'name'=>$request->name
            ]);
            
        }else{
            $mentor = Mentor::where('email',$id->email)->first();
            $mentor->update([
                'name'=>$request->name
            ]);
        }
        return back()->with('success','Akun berhasil diupdate');
    }
};
