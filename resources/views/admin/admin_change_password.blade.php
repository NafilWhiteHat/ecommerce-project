@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="container-full">

    <!-- Main content -->
    <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Admin Change Password</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('update.change.password')}}"  >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="old_password" id='current_password' class="form-control" required=""  >
                                            </div>
                                        </div>
                                    </div> 
                                    {{-- end col md 6 --}}
                                </div> 
                                {{-- end row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>New Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="form-control" required=""  >
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                {{-- end row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Confirm Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required=""  >
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                {{-- end row --}}
                                    
                                   
                               

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update</button>
                        </div>
                    </form>

                </div>
            <!-- /.col -->
            </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.content -->
</div>

  @endsection