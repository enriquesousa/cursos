<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    // UserProfile
    public function UserProfile(){
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('frontend.dashboard.edit_profile',compact('profileData'));
    }




}
