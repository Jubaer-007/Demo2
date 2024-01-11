<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function registerForm()
    {
        return view('fontend.layouts.registerForm');
    }
    public function register(Request $request)
    {
        $validate= Validator::make($request->all(),[
            'name'      =>'required',
            'email'      =>'required',
            'password'      =>'required',
            

        ]);
        
        if($validate->fails()){
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back();
        }

        Customer::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'Password'  =>bcrypt($request->password),
        ]);

        Toastr::success('Successfully Register.');
        return redirect()->route('customer.loginForm');
    }

    public function CustomerLoginForm()
    {
        return view('fontend.layouts.login'); 
    }
    public function CustomerLogin(Request $request)
    {
        $validate= Validator::make($request->all(),[
            'email'      =>'required',
            'password'      =>'required',     

        ]);
        
        if($validate->fails()){
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back();
        }

        $credentials=$request->except(['_token']);
        if(auth('customer')->attempt($credentials))
        {
           
            toastr()->success('successfully login.');
            return redirect()->route('web.home');
        }
        else
        
        {
            Toastr::error('Invalid user informations');
            return redirect()->back();
        }
    }

    public function CustomerLoginOut()
    {
        Auth('customer')->logout();
        session()->forget('cart');
        Toastr::error('successfully logout');
        return redirect()->route('web.home');

    }


}
