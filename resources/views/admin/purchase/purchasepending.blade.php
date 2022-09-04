@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Purchase Pending</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('add.purchase')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float: right;">Add Purchase</a>
                        <br> <br>

                        <h4 class="card-title">Pending Data</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th> Purchase No</th>
                                    <th>Date</th>
                                    <th>Supplier</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($purchases as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->purchase_no}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                    <td>{{$item['supplier']['name']}}</td>
                                    <td>{{$item['product']['name']}}</td>
                                    <td>{{$item['category']['name']}}</td>
                                    <td>{{$item->buying_qty}}</td>

     

                                    @if ($item->status=='0')
                                    <td> <span class="btn btn-warning">Pending</span></td>
                                    @else
                                    <td> <span class="btn btn-success">Approved</span></td> 
                                    @endif
                 
                                   
                                    <td>
                                        @if ($item->status=='0')
                                        <a class="btn btn-success sm" id="approveBtn" title=" Approved"
                                        href="{{route('approve.purchase',['id'=>$item->id])}}"><i
                                            class="fas fa-check-circle"></i></a>    
                                        @endif
                                     
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