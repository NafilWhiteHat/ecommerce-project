@extends('front_end.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                <img src="{{(!empty($data->profile_image)) ? url('upload/user_images/'.$data->profile_image):url('upload/no_image.jpg')}}"
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

                    <h3 class="text-center"><span class="text-danger">Hi....</span>
                    <strong>{{ $data->name }}</strong>
                     Welcome To Easy Online Shop </h3>

                    <div class="card-body">



                        <form method="post" action="{{ route('user.profile.store')}}" enctype="multipart/form-data">
                            @csrf


                       <div class="form-group">
                          <label class="info-title" for="exampleInputEmail1">Name <span> </span></label>
                          <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                      </div>

                      <div class="form-group">
                          <label class="info-title" for="exampleInputEmail1">Email <span> </span></label>
                          <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone <span> </span></label>
                        <input type="number" name="phone" class="form-control" value="{{ $data->phone }}">
                    </div>

                       <div class="form-group">
                          <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>
                          <input type="file" name="profile_image" class="form-control" value="{{ $data->profile_image }}">
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
