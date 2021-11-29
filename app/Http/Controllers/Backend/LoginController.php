<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view("welcome");

 }
   public function loginValidate(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
       $credentials = $request->only('email', 'password');
//        dd($credentials);
       if (Auth::guard('admin')->attempt($credentials)) {
           $request->session()->regenerate();
           return redirect()->route('dashboard.view')->with('success','You Have Successfully Logged in !!!');
       }
       return back()->withErrors([
           'email' => 'Invalid Credentials !!!',

       ]);

   }

    public function adminLogout()
    {

        Auth::logout();

        return redirect()->route('login.page')->with('success', 'Logout Successfully');
    }
}
