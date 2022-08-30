<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    public function allPortfolio(){
        $portfolio=Portfolio::latest()->get();
        return view('admin.portfolio.allPortfolio',compact('portfolio'));
    }
    public function addPortfolio(){
        return view('admin.portfolio.porfolio_add');
    }
    public function storePortfolio(Request $request){
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'area'=>'required',
            'portfolio_image'=>'required',
        ]);

        if($request->hasFile('portfolio_image')){
            $filenameWithExt=$request->file('portfolio_image')->getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //GET JUST EXTENSION
            $ext=$request->file('portfolio_image')->getClientOriginalExtension();
            $fileNameToStore=$filename ."_".time().".".$ext;
            $path=$request->file('portfolio_image')->storeAs('public/portfolio',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

        Portfolio::create([
          'portfolio_name'=>$request->name,
          'portfolio_title'=>$request->title,
          'image'=>$fileNameToStore,
          'description'=>$request->area,
        ]);
        $notification=array(
            'message'=>'Portfolio Data Successfully Inserted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
