@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide Page</h4>
                        <form action="{{route('update.slide')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="slide_id" value="{{$home->id}}">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title" type="text" value="{{$home->title}}"
                                        id="title">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="shorttile" type="text"
                                        value="{{$home->short_title}}" id="shorttile">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="v_url" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="v_url" type="text" value="{{$home->home_slide}}"
                                        id="v_url">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="home_slide" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="home_slide" type="file"
                                        value="{{$home->home_slide}}" id="home_slide">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">
                                </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{asset('storage/slide/'.$home->home_slide)}}" alt="Card image cap">
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
        $("#home_slide").change(function (e) {
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