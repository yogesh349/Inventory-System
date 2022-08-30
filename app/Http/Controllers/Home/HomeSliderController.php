<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSlide;
use Faker\Provider\Image;

class HomeSliderController extends Controller
{
    //
    public function homeSlider(){
        $home= HomeSlide::find(1);
        return view('admin.home_slide.homeslide',compact('home'));
    }

    public function updateSlider(Request $request)
    {
        # code...
        $slide_id=$request->slide_id;
        if($request->hasFile('home_slide')){

            $filenameWithExt=$request->file('home_slide')->getClientOriginalName();


            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //GET JUST EXTENSION
            $ext=$request->file('home_slide')->getClientOriginalExtension();

            $fileNameToStore=$filename ."_".time().".".$ext;

            $path=$request->file('home_slide')->storeAs('public/slide',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
        }

        $homeslide=HomeSlide::find($slide_id);
        $homeslide->title=$request->title;
        $homeslide->short_title=$request->shorttile;
        $homeslide->home_slide=$fileNameToStore;
        $homeslide->video_url=$request->v_url;
        $homeslide->save();
        $notification=array(
            'message'=>'Home Slide Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);


    }
}
