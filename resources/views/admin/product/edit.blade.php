@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Product</h4>
                        <form action="{{route('update.product',$product->id)}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" id="name" value="{{$product->name}}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name</label>
                                <div class="col-sm-10">
                                    <select name="supplier_id" class="form-select" aria-label="Default select example">
                                        @foreach ($suppliers as $item)
                                        <option value="{{$item->id}}" {{$item->id==$product->supplier_id ? 'selected':''}}>{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}" {{$item->id==$product->category_id ? 'selected':''}}>{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Units</label>
                                <div class="col-sm-10">
                                    <select name="unit_id" class="form-select" aria-label="Default select example">
                                        @foreach ($units as $item)
                                        <option value="{{$item->id}}" {{$item->id==$product->unit_id ? 'selected':''}}>{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="portfolio_image" type="file" id="portfolio_image">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">
                                </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{asset('storage/about/'.$about->about_image)}}" alt="Card image cap">
                                </div>

                            </div> --}}




                            <input type="submit" value="Update Product" class="btn btn-info waves-effect waves-light">

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>

</div>

<script>

    $(document).ready(function () {
        $("#about_image").change(function (e) {
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