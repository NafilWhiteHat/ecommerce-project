<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/reg.css')}}">

  </head>
  <body>
    <div class="container">
      <div class="row align-items-center ">
        <div class="image text-center">
          <img src="{{ asset('img/amazon.png')}}" class="rounded mx-auto d-block" alt="">
        </div>
        <div class="col d-flex justify-content-center">
          @if(Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-error">{{Session::get('error')}}</div>
          @endif
          <div class="card" style="width: 25rem;">
            <div class="card-body ">
              <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <h5 class="card-title">Create account</h5><br>
                  <div class="mb-3"><strong>Your name</strong>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="First and Lastname" value="{{ old('title') }}">
                      @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div><br>

                  <div class="mb-3"><strong>Mobile number or email</strong>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" value="{{ old('title') }}" >
                      @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div><br>

                  <div class="mb-3"><strong>Password</strong>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="At least 6 characters" value="{{old('password')}}">
                      @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div><br>

                  <div class="mb-3"> <strong>Re-enter password</strong>
                    <input type="password" name="c_password" class="form-control @error('c_password') is-invalid @enderror" placeholder="" value="{{ old('title') }}">
                      @error('c_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div><br>
                  <div class="d-grid gap-2">
                  <button class="btn btn-warning" type="submit">continue</button>
                  </div>
              </form>
              <p class="loginhere">
                        Already have an account ? <a href="{{ route('user.create')}}" class="loginhere-link">Sign in</a>
              </p>
            </div>
          </div>
        </div>
      </div> 
    </div>




    <script src="https://cdn.jsdelivr.net/npm/popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>