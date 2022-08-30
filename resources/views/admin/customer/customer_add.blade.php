
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Customer</h4>
                        <form action="{{route('store.customer')}}" method="post" enctype="multipart/form-data">

                            @csrf
                       
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text"
                                        id="name">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="mobile_no" class="col-sm-2 col-form-label">Mobile Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="mobile_no" type="text" id="mobile_no">
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                        <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="address" type="text" id="address">
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="customer_image" class="col-sm-2 col-form-label">Customer Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="customer_image" type="file"
                                        id="customer_image">
                                </div>
                            </div>


                              <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">
                                </label>
                                <div class="col-sm-10">
                                  {{-- <img id="showImage" class="rounded avatar-lg"
                                        src="{{asset('storage/customer/'.$customer->customer_image)}}" alt="Card image cap">  --}}
                                </div>

                            </div>
                            <input type="submit" value="Add Customer" class="btn btn-info waves-effect waves-light">

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>

</div>

<script>

    $(document).ready(function () {
        $("#customer_image").change(function (e) {
            console.log("fsfs");
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });

    });
</script>
@endsection
    