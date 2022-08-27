@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center class=" mt-3">
                        <img class="rounded-circle avatar-xl" src="{{asset('storage/images/'.$admin->profile_image)}}" alt="Card image cap">
                    </center>
                   
                    <div class="card-body">
                        <h4 class="card-title">Name : {{$admin->name}}</h4>
                        <hr>
                        <h4 class="card-title">Email : {{$admin->email}}</h4>
                        <hr>
                        <h4 class="card-title">Username : {{$admin->username}}</h4>
                        <hr>

                        <a href="{{route('editprofile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                     
                    </div>
                </div>
            </div>


            {{-- <div class="col-lg-4">
                <div class="card">
                    <img class="card-img img-fluid" src="assets/images/small/img-6.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-white">Card title</h4>
                        <p class="card-text text-light">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-white">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div> --}}

        </div>

    </div>

</div>
@endsection