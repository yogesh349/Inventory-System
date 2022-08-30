@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Page</h4>
                        <form action="{{route('update.about')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="about_id" value="{{$about->id}}">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title" type="text" value="{{$about->title}}"
                                        id="title">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="shorttile" type="text"
                                        value="{{$about->short_title}}" id="shorttile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                        <textarea name="short_desc" class="form-control" id="short_desc" rows="5">{{$about->short_description}}</textarea>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label for="short_desc" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                        <textarea name="area" class="form-control" id="elm1" rows="5">{{$about->long_description}}</textarea>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="about_image" type="file"
                                        id="about_image">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">
                                </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{asset('storage/about/'.$about->about_image)}}" alt="Card image cap">
                                </div>

                            </div>




                            <input type="submit" value="Update About Data" class="btn btn-info waves-effect waves-light">

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
    