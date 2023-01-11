<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $admindata = Admin::find(1);
        return view('admin.admin_profile_view',compact('admindata'));
    }

    public function AdminProfileEdit(){
        $editdata = Admin::find(1);
        return view('admin.admin_profile_edit',compact('editdata'));
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            @unlink(public_path('upload/admin_images/'.$data->profile_image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' =>  'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword(){

        return view('admin.admin_change_password');
    }

    public function UpdateChangePassword(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedpassword = Admin::find(1)->password;
        if(Hash::check($request->old_password,$hashedpassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            
        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' =>  'success'
        );
        
            return redirect()->back()->with($notification);
        }else{
            $error = array(
                'message' => 'Password does not change',
                'alert-type' =>  'error'
            );
            return redirect()->back()->with($error);
        }
        
    }
}
