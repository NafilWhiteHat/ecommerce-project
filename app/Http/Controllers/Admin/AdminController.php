<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function LoginView(){
        return view('admin.login');
       }

       public function Login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $check = $request->only('email','password');
        if(Auth::guard('admin')->attempt($check)){
            return redirect()->route('admin.dashboard')->with('success','welcome to login');
        }else{
            return redirect()->back()->with('error','Login failed');
        }
       }

       public function AdminHome(){
        return view('admin.index');
       }
    

       public function Logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
       }
}
