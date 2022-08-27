<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    //


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile()
    {
        # code...
        $id=Auth::id();
        $admin=User::find($id);
        return view('admin.profile_view',compact('admin'));
    }

    public function editProfile(){
        $id=Auth::id();
        $editData=User::find($id);
        return view('admin.editProfile',compact('editData'));

    }

    public function store(Request $request){
        $id=Auth::id();
        $user=User::find($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'username'=>'required',
            'profile_image'=>'required',

        ]);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->username=$request->username;



        if($request->hasFile('profile_image')){

            $filenameWithExt=$request->file('profile_image')->getClientOriginalName();


            //get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //GET JUST EXTENSION
            $ext=$request->file('profile_image')->getClientOriginalExtension();

            $fileNameToStore=$filename ."_".time().".".$ext;

            $path=$request->file('profile_image')->storeAs('public/images',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
        }

        $user->profile_image= $fileNameToStore;
        $user->save();
        $notification=array(
            'message'=>'Admin Profile Updated Sucessfully',
            'alert-type'=>'success'
        );
        return redirect(route('admin.profile'))->with($notification);
 
        

    }
    public function changePassword(){
        return view('admin.change_password');

    }

    public function updatePassword(Request $request){
        $vallidate=$request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirmpassword'=>'required|same:newpassword',

        ]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::id());
            if($request->newpassword==$request->confirmpassword){
                $user->password=bcrypt($request->newpassword);
                $user->save();
                $notification=array(
                    'message'=>'Password Updated SuccessFully',
                    'alert-type'=>'success'
                );
               
                return redirect(route('dashboard'))->with($notification);

            }
           
        }else{
            $notification=array(
                'message'=>' Old Password doesnot  Match',
                'alert-type'=>'success'
            );
            return redirect(route('dashboard'))->with($notification);

        }

    }

}
