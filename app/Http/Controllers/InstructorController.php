<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    // InstructorDashboard
    public function InstructorDashboard(){
       return view('instructor.index');
    }

    // InstructorLogout
    public function InstructorLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/instructor/login');
    }

    // InstructorLogin
    public function InstructorLogin(){
        return view('instructor.instructor_login');
    }


    
}
