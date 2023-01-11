<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{


    public function create(){
        return view('user.register');
    }

   public function store(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:15',
        'c_password' => 'required|same:password',
    ]);
    $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),

    ]);


    $data = $user->save();


    if($data){
        return redirect()->route('home')->with('success','Register Successfully');
    }else{
        return redirect()->back()->with('error','Registation failed');
    }
   //  $user->name = $request->name;
   //  $user->email = $request->email;
   //  $user->password = Hash::make($request->password);
   //  $data = $user->save();
   //  if($data){
   //      return redirect()->back()->with('success','you have registered successfully');

   //  }else{
   //      return redirect()->back()->with('error','Registation failed');
   //  }



   }
   public function LoginView(){
    return view('user.login');
   }
   public function Login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $check = $request->only('email','password');
    $notification = array(
        'message' => 'Admin Profile Updated successfully',
        'alert-type' => 'info'
    );
    if(Auth::guard('web')->attempt($check)){
        return redirect()->route('user.dashboard')->with($notification);
    }else{
        return redirect()->back()->with('error','Login failed');
    }
   }

   public function UserHome(){
    $id = Auth::user()->id;
    $data = User::find($id);
      
    return view('user_dashboard',compact('data'));
   }

   public function Logout(){
    Auth::guard('web')->logout();
    return redirect('/user/login');
   }

}
