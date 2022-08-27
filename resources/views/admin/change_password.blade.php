@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password</h4>
                        <form action="{{route('update.password')}}" method="post">

                            @csrf
                            <div class="row mb-3">
                                <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="oldpassword" type="password" value="" id="oldpassword">
                                </div>
                            </div>
                            @error('oldpassword')
                            <span style="margin-left: 10rem" class="text-danger">{{$message}}</span>
                                
                            @enderror

                            <div class="row mb-3">
                                <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="newpassword" type="password" value="" id="newpassword">
                                </div>
                            </div>
                            @error('newpassword')
                            <span style="margin-left: 10rem;" class="text-danger ">{{$message}}</span>
                                
                            @enderror

                            <div class="row mb-3">
                                <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="confirmpassword" type="password" value="" id="confirmpassword">
                                </div>
                            </div>
                            @error('confirmpassword')
                            <span style="margin-left: 10rem" class="text-danger">{{$message}}</span>
                                
                            @enderror

                            <br>
                            


                            <input type="submit" value="Change Password" class="btn btn-info waves-effect waves-light">

                        </form>
                       
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

       
    </div>

</div>


@endsection