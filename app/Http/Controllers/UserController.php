<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Index
    public function Index(){
        return view('frontend.index');
    }

    // UserLogin
    public function UserLogin(){
       return view('frontend.dashboard.login');
    }

    // UserRegister
    public function UserRegister(){
       return view('frontend.dashboard.register');
    }


}
