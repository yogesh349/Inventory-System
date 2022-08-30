<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function customerAll(){
        $customers=Customer::all();
        
        return view('admin.customer.customer_all',compact('customers'));
    }
    public function customerAdd(){
        return view('admin.customer.customer_add');
    }

    public function storeCustomer(Request $request){
    
        $request->validate([
            'name'=>'required',
            'mobile_no'=>'required',
            'email'=>'required',
            'address'=>'required',
            'customer_image'=>'required',
        ]);
        if($request->hasFile('customer_image')){

            $filenameWithExt=$request->file('customer_image')->getClientOriginalName();


            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //GET JUST EXTENSION
            $ext=$request->file('customer_image')->getClientOriginalExtension();

            $fileNameToStore=$filename ."_".time().".".$ext;

            $path=$request->file('customer_image')->storeAs('public/customer',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
        }

        Customer::create(
            [
                'name'=>$request->name,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'address'=>$request->address,
                'customer_image'=>$fileNameToStore,
                'created_by'=>Auth::id(),
            ]
            );
            $notification=array(
                'message'=>'Customer Added Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('customer.all')->with($notification);
    }

    public function editCustomer($id){
        $customer=Customer::find($id);
        return view('admin.customer.editCustomerForm',compact('customer'));
    }

    public function updateCustomer(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'mobile_no'=>'required',
            'email'=>'required',
            'address'=>'required',
            'customer_image'=>'required',
        ]);
        if($request->hasFile('customer_image')){

            $filenameWithExt=$request->file('customer_image')->getClientOriginalName();


            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //GET JUST EXTENSION
            $ext=$request->file('customer_image')->getClientOriginalExtension();

            $fileNameToStore=$filename ."_".time().".".$ext;

            $path=$request->file('customer_image')->storeAs('public/customer',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
        }

        Customer::find($id)->update(
            [
                'name'=>$request->name,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'address'=>$request->address,
                'customer_image'=>$fileNameToStore,
                'created_by'=>Auth::id(),
            ]
            );
            $notification=array(
                'message'=>'Customer Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('customer.all')->with($notification);




    }
    public function deleteCustomer($id){
        $customer=Customer::findOrFail($id);
        unlink('storage/customer/'.$customer->customer_image);
        $customer->delete();
        $notification=array(
            'message'=>'Customer Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
 
}
