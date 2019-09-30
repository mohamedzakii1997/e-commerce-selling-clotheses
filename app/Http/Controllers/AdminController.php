<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Service;
use DB;
use App\Userservice;
use Hash;
use PHPUnit\Framework\Constraint\Exception;
use Stripe\Stripe;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
       
    }

/** user fuctions */
    public function index(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function edituser($id){
        $user = User::FindOrFail($id);
        return view('admin.edituser',compact('user'));
    }
    public function updateuser(Request $request,$id){
       
  
        $this->validate($request, [
            'name'=>'required',
        'email'=>'required|email',
        'address'=>'required',
        'phone'=>'required',
        'password'=>'nullable|min:8'
        ]);
       
       $user = User::FindOrFail($id);
       if($request->filled('password')){
        $user->password =  Hash::make($request->input('password'));

       }
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->address = $request->input('address');
       $user->phone = $request->input('phone');
       $user->save();
        
        return redirect('users')->with('sucsess','Customer Record Edited');
    }
    public function deleteuser($id){
        $user = User::FindOrFail($id)->delete();
        return redirect('users')->with('sucsess','Costomer Deleted');
    }



/** product functions */




}
