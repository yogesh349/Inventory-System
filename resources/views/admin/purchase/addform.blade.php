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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input class="form-control example-date-input" type="date"  id="date">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="purchase_no" class="form-label">Purchase No</label>
                                    <input class="form-control example-date-input" id="purchase_no" name="purchase_no" type="text"  id="date">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="date" class="form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-select" aria-label="Default select example">
                                            <option selected value="">Select Supplier</option>
                                            @foreach ($suppliers as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="date" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                            <option selected value="">Select Category</option>
                         
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="date" class="form-label">Product Name</label>
                                        <select name="product_id" id="product_id" class="form-select" aria-label="Default select example">
                                            <option selected value="">Select Product</option>
            
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3" style="margin-top: 29px;">
                                    <i class="addeventmore btn btn-secondary btn-rounded waves-effect waves-light  fas fa-plus-circle"> Add More</i>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="card-body">
                        <form action="{{route('purchase.store')}}" method="post">
                            @csrf
                            <table class="table-sm table-bordered" width='100%' style="border-color:#ddd;">

                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Produt Name</th>
                                    <th>Psc/Kg</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">

                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="5"></td>
                                    <td>
                                        <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;">
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton">Purchase Store</button>
                        </div>
                        </form>
                    </div>
                    <div> 
                </div>
            </div> <!-- end col -->
        </div>
    </div>

</div>


<script id="document-template" type="text/x-handlebars-template">
    <tr id="delete_add_more_item" class="delete_add_more_item">

        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_no[]" value="@{{supplier_no}}"> 
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
    
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
    
        <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
        </td>
    
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
        </td>
    
        <td>
            <input type="text" class="form-control desc text-right" name="desc[]" value="">
        </td>
    
        <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0"readonly>
        </td>
        <td>
            <i class="removeeventmore btn btn-danger btn-sm fas fa-window-close"></i>
        </td>
    </tr>
</script>

<script>
    $(document).ready(function () {

  

        $(document).on('click', '.removeeventmore', function() {
             $(this).closest(".delete_add_more_item").remove() });
             totalAmount();


        $(".addeventmore").click(function (e) { 
            e.preventDefault();
            var date=$("#date").val();
            var purchase_id=$('#purchase_no').val();
            var supplier_id=$('#supplier_id').val();
            var category_id=$('#category_id').val();
            var category_name=$('#category_id').find('option:selected').text();
            var product_id=$('#product_id').val();
            var product_name=$('#product_id').find('option:selected').text();

            if(date==''){
                $.notify('Date is required',{globalPosition:'top right',className:'error'});
                return false;
            }

            if(purchase_id==''){
                $.notify('Purchase No is required',{globalPosition:'top right',className:'error'});
                return false;
            }

            if(supplier_id==''){
                $.notify('Supplier is required',{globalPosition:'top right',className:'error'});
                return false;
            }

            if(category_id==''){
                $.notify('Category is required',{globalPosition:'top right',className:'error'});
                return false;
            }

            if(product_id==''){
                $.notify('Product is required',{globalPosition:'top right',className:'error'});
                return false;
            }

            var source=$('#document-template').html();
            var template=Handlebars.compile(source);
            var data={
                'date':date,
                'purchase_no':purchase_id,
                'supplier_no':supplier_id,
                'category_id':category_id,
                'category_name':category_name,
                'product_id':product_id,
                'product_name':product_name,
            };
            var html=template(data);
            $("#addRow").append(html);  
        });

        $(document).on('keyup click','.unit_price,.buying_qty',function(){
            var unit_price=$(this).closest("tr").find("input.unit_price").val();
            var qty=$(this).closest("tr").find("input.buying_qty").val();
            var total=unit_price * qty;
            var qty=$(this).closest("tr").find("input.buying_price").val(total);
            totalAmount();
        })


        function totalAmount(){
            var sum=0;
            $(".buying_price").each(function(){
                
                var value=$(this).val();
                if(!isNaN(value) && value.length!=0){
                    sum+=parseFloat(value);
                }
            });
            $('.estimated_amount').val(sum);

        }

    });
</script>


<script>
    $("#supplier_id").change(function (e) { 
        e.preventDefault();
        var supplier_id=$(this).val();
        $.ajax({
            type: "GET",
            url: "{{route('get-category')}}",
            data: {'supplier_id':supplier_id},
            success: function (data) {
                var html='<option value="" >Select Category Name</option>';
                $.each(data, function (key, value) { 
                    html+='<option value="'+value.category_id +'">'+value.category.name+'</option>';                  
                });
                $('#category_id').html(html);   
            }
        });
        
    });


</script>


<script>
    $("#category_id").change(function (e) { 
        e.preventDefault();
        var category_id=$(this).val();
        $.ajax({
            type: "GET",
            url: "{{route('get-products')}}",
            data: {'category_id':category_id},
            success: function (data) {
                var html='<option value="" >Select Product</option>';
                $.each(data, function (key, value) { 
                    html+='<option value="'+value.id +'">'+value.name+'</option>';                  
                });
                $('#product_id').html(html);   
            }
        });
        
    });


</script>
@endsection