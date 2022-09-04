<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function productAll(){
        $products=Product::all();
        return view('admin.product.product_all',compact('products'));
    }

    public function productAdd(){
        $suppliers=Supplier::all();
        $units=Unit::all();
        $categories=Category::all();
        return view('admin.product.addProduct',compact('suppliers','units','categories'));

    }
    public function storeProduct(Request $request){


        Product::create(
            [
                'supplier_id'=>$request->supplier_id,
                'unit_id'=>$request->unit_id,
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'created_by'=>Auth::id(),
            ]
            );

            $notification=array(
                'message'=>'Product Inserted Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('product.all')->with($notification);
    

    }

    public function editProduct($id){
        $suppliers=Supplier::all();
        $units=Unit::all();
        $categories=Category::all();
        $product=Product::find($id);
        return view('admin.product.edit',compact('suppliers','units','categories','product'));

    }


    public function updateProduct(Request $request,$id){


        Product::find($id)->update(
            [
                'supplier_id'=>$request->supplier_id,
                'unit_id'=>$request->unit_id,
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'updated_by'=>Auth::id(),
            ]
            );

            $notification=array(
                'message'=>'Product Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('product.all')->with($notification);
    

    }

    public function deleteProduct($id){
        Product::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Product deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('product.all')->with($notification);


    }
}
