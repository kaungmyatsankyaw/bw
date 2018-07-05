<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Validator;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index(){
        $data['users']=User::where('admin_level',0)->orWhere('admin_level',2)->orWhere('admin_level',3  )->get();
        return view('admin/user/index',$data);
    }

    public function edit($id){
        $data['user']=User::find($id);
        return view('/admin/user/edit',$data);
    }

    public function update(Request $request,$id){
        $user=User::find($id);
        $user->admin_level=$request->get('admin_level');
        $user->save();
        Session::flash('success','User Update Success');
        return redirect('/admin/user');
    }

    public function delete($id){
        User::destroy($id);
        Session::flash('success','User Update Success');
        return redirect('/admin/user');
    }

    public function register(){
      return view('/admin/user/register');
    }

    public function register_user(Request $request){
      $name=$request->get('name');
      $username=$request->get('username');
      $password=bcrypt($request->get('password'));
      $address=$request->get('address');
      $phone_number=$request->get('phone_number');


      User::create([
        'name'=>$name,
        'username'=>$username,
        'password'=>$password,
        'address'=>$address,
        'phone_number'=>$phone_number
      ]);


      return redirect('/admin/user');
    }

    public function resetpassword($id){
      $user=User::find($id);
      return view('admin/user/reset',compact('user',$user));
    }

    public function reset(Request $request,$id){
    if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function password_true($old_password,$id){
      $user=User::find($id);
      if(bcrypt($old_password)==$user->password){
        return true;
      }
    }

}
