<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class HomeController extends Controller
{
        public function home()
        {
            // if(Session::get('roll') == 2){
            //     $person = Person::all();
            //     return view('home')->with('person', $person);
            // }elseif(Session::get('roll') == 1){
            //     return redirect('/dashboard');
            // }else{
                return view('pembimbing.index');
            
        }
}
