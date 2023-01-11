@extends('front_end.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

            <div class="col-md-2"><br><br>
                <img src="{{(!empty($data->profile_image)) ? url('upload/user_images/'.$data->profile_image):url('upload/no_image.jpg')}}"
                    height="100%" width="100%" class="card-image-top" style="border-radius: 50%" alt=""><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
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
                    <strong>{{ Auth::user()->name }} </strong>
                     Welcome To Easy Online Shop </h3>

                </div>
            </div> <!-- // end col md 6 -->

        </div>
    </div>
</div>





@endsection






















{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Document</title>
</head>
<body>
    <h1>Welcome User</h1>

    <a href="{{ route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('user.logout')}}" method="POST">
        @csrf
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
          @endif
        </script>

</body>
</html> --}}
