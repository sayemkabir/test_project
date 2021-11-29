<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registrationPage(){

        return view('registration.regForm');

    }
    public function doRegistration(Request $request){

        $request->validate([
            "user_name"=>'required',
            "email"=>'email|required|unique:admins',
            "password"=>'required|min:6'
        ]);

        Admin::create([
           'user_name'=>$request->user_name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        return redirect()->route('login.page')->with('success',"Your account was created successfully. Log in now.");


    }
}
