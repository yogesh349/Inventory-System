<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    //
    public function purchaseAll(){
        $purchases=Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('admin.purchase.all',compact('purchases'));
    }

    public function purchaseAdd(){
        $suppliers=Supplier::all();
        $units=Unit::all();
        $categories=Category::all();
        return view('admin.purchase.addform',compact('suppliers','units','categories'));
    }

    public function storePurchase(Request $request){
        if($request->category_id==null){
            $notification=array(
                'message'=>'Sorry You Do Not Select Any Item',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $count_category=count($request->product_id);
            for ($i=0; $i < $count_category; $i++) { 
                # code...
                $purchase = New Purchase();
                $purchase->date=date('Y-m-d',strtotime($request->date[$i]));
                $purchase->supplier_id=$request->supplier_no[$i];
                $purchase->category_id=$request->category_id[$i];
                $purchase->product_id=$request->product_id[$i];
                $purchase->purchase_no=$request->purchase_no[$i];
                $purchase->description=$request->desc[$i];
                $purchase->buying_qty=$request->buying_qty[$i];
                $purchase->unit_price=$request->unit_price[$i];
                $purchase->buying_price=$request->buying_price[$i];
                $purchase->created_by=Auth::id();
                $purchase->status="0";
                $purchase->save();
            }
            $notification=array(
                'message'=>'Purchase Data Saved Sucessfully',
                'alert-type'=>'success'
            );
            return redirect()->route('purchase.all')->with($notification);
        }
    }

    public function deletePurchase($id){
        Purchase::findorFail($id)->delete();
        $notification=array(
            'message'=>'Purchase Item Deleted Sucessfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    
    }

    public function purchasePending(){
        $purchases=Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('admin.purchase.purchasepending',compact('purchases'));

    }

    public function approvePurchase($id){
        $purchase=Purchase::findOrFail($id);
        $product=Product::where('id',$purchase->product_id)->first();
        $purchase_qty=((float)($purchase->buying_qty)) +((float)($product->quantity));
        $product->quantity=$purchase_qty;
        
        if($product->save()){
            $purchase->update([
                'status'=>'1',

            ]);
            $notification=array(
                'message'=>'Purchase Item Approved Sucessfully',
                'alert-type'=>'success'
            );
            return redirect()->route('purchase.all')->with($notification);
        }


    }
}
