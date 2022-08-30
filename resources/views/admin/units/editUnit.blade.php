@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Supplier</h4>
                        <form action="{{route('update.unit',$unit->id)}}" method="post" enctype="multipart/form-data">

                            @csrf
                       
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text"
                                        id="name" value="{{$unit->name}}">
                                </div>
                            </div>

                            <input type="submit" value="Update Unit" class="btn btn-info waves-effect waves-light">

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>

</div>


@endsection
    