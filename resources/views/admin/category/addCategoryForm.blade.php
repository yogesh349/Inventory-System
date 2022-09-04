@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Category</h4>
                        <form action="{{route('store.category')}}" method="post" enctype="multipart/form-data">

                            @csrf
                       
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text"
                                        id="name">
                                </div>
                            </div>

                            <input type="submit" value="Add Category" class="btn btn-info waves-effect waves-light">

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>

</div>


@endsection
    