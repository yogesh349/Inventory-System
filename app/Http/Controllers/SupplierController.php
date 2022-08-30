<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    //

    public function supplierAll(){
        $suppliers=Supplier::latest()->get();
        return view('admin.supplier.all_supplier',compact('suppliers'));
    }
    public function addSupplier()
    {
        # code...
        return view('admin.supplier.supplierAdd');
    }

    public function storeSupplier(Request $request){
        $validate=$request->validate(
            [
                'name'=>'required',
                'mobile_no'=>'required',
                'email'=>'required',
                'address'=>'required',

            ]
            );

            Supplier::create(
                [
                    'name'=>$request->name,
                    'mobile_no'=>$request->mobile_no,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'created_by'=>Auth::id(),
                ]
            );

            $notification=array(
                'message'=>'Supplier Has Added Sucessfully!!',
                'alert-type'=>'success'
            );
            return redirect()->route('all.supplier')->with($notification);
        

    }
    public function editSupplier($id){
         $supplier=Supplier::find($id);
        return view('admin.supplier.editSuplierForm',compact('supplier'));
    }
    public function updateSupplier($id, Request $request){
        Supplier::find($id)->update([
            'name'=>$request->name,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'address'=>$request->address,
            'update_by'=>Auth::id(),
        ]);

        $notification=array(
            'message'=>'Supplier Data Updated Sucessfully!!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.supplier')->with($notification);
        

    }

    public function deleteSupplier($id){
        Supplier::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Supplier Data Delteted Sucessfully!!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.supplier')->with($notification);
    }
}
