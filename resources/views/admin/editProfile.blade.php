@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile</h4>
                        <form action="{{route('store.profile')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{$editData->name}}" id="name">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" value="{{$editData->email}}" id="email">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">UserName</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="username" type="text" value="{{$editData->username}}" id="username">
                                </div>
                            </div>


                            
                            <div class="row mb-3">
                                <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="profile_image" type="file" value="{{$editData->username}}" id="profile_image">
                                </div>
                            </div>




                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label"> 
                                </label>
                                <div class="col-sm-10">
                                    <img  id="showImage" class="rounded avatar-lg" src="{{asset('storage/images/'.$editData->profile_image)}}" alt="Card image cap">
                                </div>
                               
                            </div>

                            <input type="submit" value="Update Profile" class="btn btn-info waves-effect waves-light">

                        </form>
                       
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

       
    </div>

</div>

<script>

    $(document).ready(function () {
        $("#profile_image").change(function (e) { 
            console.log("fsfs");
            e.preventDefault();
            var reader=new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            
        });
        
    });
</script>
@endsection