<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;

class Aboutcontroller extends Controller
{
    //
    public function AboutPage(){
        $about=About::find(1);
        return view('admin.about_page.about_page_all',compact('about'));
    }

    public function update(Request $request){
        $about_id=$request->about_id;
        if($request->hasFile('about_image')){
            $filenameWithExt=$request->file('about_image')->getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //GET JUST EXTENSION
            $ext=$request->file('about_image')->getClientOriginalExtension();
            $fileNameToStore=$filename ."_".time().".".$ext;
            $path=$request->file('about_image')->storeAs('public/about',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }
        About::findOrFail($about_id)->update(
          [
            'title'=> $request->title,
            'short_title'=> $request->shorttile,
            'short_description'=> $request->short_desc,
            'long_description'=> $request->area,
            'about_image'=>$fileNameToStore,

          ]
        );
        $notification=array(
            'message'=>'About Data Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);


    }

    public function homeAbout(){
        $about=About::find(1);
        return view('frontend.about',compact('about'));
    }
    public function multiImage(){
        return view('admin.about_page.multimage');
    }

    public function storeMultiImage(Request $request)
    {
        # code...
        $images=$request->file('about_image');
        foreach ($images as $image) {
            # code...

            if($request->hasFile('about_image')){
                $filenameWithExt=$image->getClientOriginalName();
                //get just filename
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                //GET JUST EXTENSION
                $ext=$image->getClientOriginalExtension();
                $fileNameToStore=$filename ."_".time().".".$ext;
                $path=$image->storeAs('public/multi-image',$fileNameToStore);
            }else{
                $fileNameToStore='noimage.jpg';
            }
            MultiImage::create(
                [
                    'multi_image'=>$fileNameToStore,
                ]
                );
        }
        $notification=array('message'=>'Multiple images updated sucessfully',
        'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function showmultiImage(){

        $allmultiImage=MultiImage::all();
        return view('admin.about_page.allMultiImage',compact('allmultiImage'));
    }
    public function editMultimage($id){
        $multiImage=MultiImage::find($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));

    }
    public function updateMultiImage(Request $request){

        $multi_id=$request->multi_image_id;
        if($request->hasFile('about_image')){
            $filenameWithExt=$request->file('about_image')->getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //GET JUST EXTENSION
            $ext=$request->file('about_image')->getClientOriginalExtension();
            $fileNameToStore=$filename ."_".time().".".$ext;
            $path=$request->file('about_image')->storeAs('public/multi-image',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }
        MultiImage::findOrFail($multi_id)->update(
          [
            
            'multi_image'=>$fileNameToStore,

          ]
        );
        $notification=array(
            'message'=>'Multi images Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.multiImage')->with($notification);



    }

    public function destroyMultImage($id){


        $image=MultiImage::findOrFail($id);
        unlink('storage/multi-image/'.$image->multi_image);
        $image->delete();
        $notification=array(
            'message'=>'Images Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
       

}

