@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Category List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('add.category')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float: right;">Add Category</a>
                        <br> <br>

                        <h4 class="card-title">Category Data</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="7%">Serial No</th>
                                    <th> Name</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($category as $item)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a class="btn btn-info sm" title="Edit Data"
                                            href="{{route('edit.category',['id'=>$item->id])}}"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger sm" id="delete" title="Delete Data"
                                            href="{{route('delete.category',['id'=>$item->id])}}"><i
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