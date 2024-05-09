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

    // UserProfileUpdate
    public function UserProfileUpdate(Request $request){

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

            if ($data->photo != '' && file_exists(public_path('upload/user_images/' . $data->photo))) {
                @unlink(public_path('upload/user_images/' . $data->photo)); // para borrar si ya hay imagen en el directorio
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Datos de Usuario Actualizados Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    // UserLogout
    public function UserLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // UserChangePassword
    public function UserChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('frontend.dashboard.user_change_password',compact('profileData'));
    }




}
