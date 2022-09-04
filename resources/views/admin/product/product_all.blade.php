@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Product List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('add.product')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float: right;">Add Product</a>
                        <br> <br>

                        <h4 class="card-title">Product Data</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th> Name</th>
                                    <th>Supplier Name</th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($products as $item)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item['supplier']['name']}}</td>
                                    <td>{{$item['unit']['name']}}</td>
                                    <td> {{$item['category']['name']}}</td>
                                    <td>
                                        <a class="btn btn-info sm" title="Edit Data"
                                            href="{{route('edit.product',['id'=>$item->id])}}"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger sm" id="delete" title="Delete Data"
                                            href="{{route('delete.product',['id'=>$item->id])}}"><i
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