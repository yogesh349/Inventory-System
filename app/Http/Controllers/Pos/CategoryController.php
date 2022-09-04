<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //

    public function categoryAll(){
        $category=Category::all();
        return view('admin.category.categoryAll',compact('category'));
    }

    public function categoryAdd(){
        return view('admin.category.addCategoryForm');
    }

    public function storeCategory(Request $request){
        $request->validate(
            [
                'name'=>'required',
            ]
            );

        Category::create(
            [
                'name'=>$request->name,
                'created_by'=>Auth::id(),
            ] 
            );

            $notification=array(
                'message'=>'Category Added Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('category.all')->with($notification);

    }

    public function editCategory($id){
        $category=Category::find($id);
        return view('admin.category.editCategory',compact('category'));
    }
    public function updateCategory(Request $request,$id){
        $request->validate(
            [
                'name'=>'required',
            ]
            );

        Category::findOrFail($id)->update(
            [
                'name'=>$request->name,
                'udated_by'=>Auth::id(),
            ] 
            );

            $notification=array(
                'message'=>'Category Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('category.all')->with($notification);

    }

    public function deleteCategory($id){
        $unit=Category::find($id)->delete();

        $notification=array(
            'message'=>'Unit Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('category.all')->with($notification);


    }
}
