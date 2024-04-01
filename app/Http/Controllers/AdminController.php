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

    // StoreAdminProfile
    public function StoreAdminProfile(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // si existe imagen, entonces se va a actualizar imagen
        if ($request->file('photo')) {
            $file = $request->file('photo');

            if ($data->photo != '' && file_exists(public_path('upload/admin_images/' . $data->photo))) {
                @unlink(public_path('upload/admin_images/' . $data->photo)); // para borrar si ya hay imagen en el directorio
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Datos de Administrador actualizados correctamente',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       
    }

    // AdminChangePassword
    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.admin_change_password',compact('profileData'));
    }



    
}
