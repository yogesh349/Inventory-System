<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    //
    public function unitAll(){
        $units=Unit::all();
        return view('admin.units.unitAll',compact('units'));
    }
    public function unitAdd(){
        return view('admin.units.addUnitForm');
    }

    public function storeUnit(Request $request){
        $request->validate(
            [
                'name'=>'required',
            ]
            );

        Unit::create(
            [
                'name'=>$request->name,
                'created_by'=>Auth::id(),
            ] 
            );

            $notification=array(
                'message'=>'Unit Added Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('unit.all')->with($notification);

    }

    public function editUnit($id){
        $unit=Unit::find($id);
        return view('admin.units.editUnit',compact('unit'));
    }

    public function updateUnit(Request $request,$id){

        $request->validate(
            [
                'name'=>'required',
            ]
            );

        Unit::findOrFail($id)->update(
            [
                'name'=>$request->name,
                'updated_by'=>Auth::id(),
            ] 
            );

            $notification=array(
                'message'=>'Unit Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('unit.all')->with($notification);

    }

    public function deleteUnit($id){
        $unit=Unit::find($id)->delete();

        $notification=array(
            'message'=>'Unit Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('unit.all')->with($notification);


    }
}
