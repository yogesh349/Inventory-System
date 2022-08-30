@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Portfolio</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio Data</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Portfolio Name</th>
                                    <th>Portfolio Title</th>
                                    <th>Portfolio Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($portfolio as $item)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->portfolio_name}}</td>
                                    <td>{{$item->portfolio_title}}</td>
                                    <td><img src="{{asset('storage/portfolio/'.$item->image)}}" alt="" width="100px">
                                    </td>
                                    <td>
                                        <a class="btn btn-info sm" title="Edit Data"
                                            href="{{route('edit.multi.image',['id'=>$item->id])}}"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger sm" id="delete" title="Delete Data"
                                            href="{{route('delete.multimage',['id'=>$item->id])}}"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>
</div>
@endsection