@extends('front_end.main_master')
@section('content')
@php
    $user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                <img src="{{(!empty($user->profile_image)) ? url('upload/user_images/'.$user->profile_image):url('upload/no_image.jpg')}}"
                    height="100%" width="100%" class="card-image-top" style="border-radius: 50%" alt=""><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('user.dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm btn-block">Log out</a>
                            <form id="logout-form" action="{{ route('user.logout')}}" method="POST">
                            @csrf
                            </form>
                    </ul>
            </div>
            <div class="col-md-2">

            </div> <!-- // end col md 2 -->
            <div class="col-md-6">
                <div class="card">

                    <h3 class="text-center"><span class="text-danger">Change Password</span>
                    <strong></strong> </h3>

                    <div class="card-body">



                        <form method="post" action="{{ route('user.password.update')}}" >
                            @csrf


                       <div class="form-group">
                          <label class="info-title" for="exampleInputEmail1">Current Password <span> </span></label>
                          <input type="password" name="old_password" id="old_password" class="form-control" value="">
                      </div>

                      <div class="form-group">
                          <label class="info-title" for="exampleInputEmail1">New Password <span> </span></label>
                          <input type="password" name="password" id="password" class="form-control" value="">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password <span> </span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="">
                    </div>

                       <div class="form-group">
                         <button type="submit" class="btn btn-danger">Update</button>
                      </div>



                        </form>
                    </div>
                </div>
            </div> <!-- // end col md 6 -->
        </div>
    </div>
</div>
@endsection
