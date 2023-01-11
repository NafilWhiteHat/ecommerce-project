<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class IndexController extends Controller
{
        public function Index(){
            return view('front_end.index');
        }

    public function UserProfile(){
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('front_end.profile.user_profile',compact('data'));


    }

    public function UserProfileStore(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'profile_image' => 'required',
        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            @unlink(public_path('upload/user_images/'.$data->profile_image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' =>  'success'
        );
        return redirect()->route('user.dashboard')->with($notification);

    }

    public function UserChangePassword(){

        return view('front_end.profile.change_password');
    }

    public function UserPasswordUpdate(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->old_password,$hashedpassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' =>  'success'
        );

            return redirect()->route('user.dashboard')->with($notification);
        }else{
            $error = array(
                'message' => 'Password does not change',
                'alert-type' =>  'error'
            );
            return redirect()->back()->with($error);
        }
    }
}
