<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    // AdminDashboard
    public function AdminDashboard(){
        return view('admin.index');
    }

    // AdminLogout
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    // AdminLogin
    public function AdminLogin(){
       return view('admin.admin_login');
    }

    // AdminProfile
    public function AdminProfile(){
       $id = Auth::user()->id;
       $profileData = User::findOrFail($id);
       return view('admin.admin_profile_view',compact('profileData'));
    }



    
}
