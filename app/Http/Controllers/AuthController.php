<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('backend.layouts.auth.loginForm');
    }
    public function login(Request $request)
    {
    $request->validate([
        "userName"=> "required|email|unique:users,id",
        "password"=> "required|min:6|max:16"
    ]);
  
    $credentials=$request->except(['_token']);
    if(auth()->attempt($credentials))
    {
        toastr()->success('wow !! successfully login.');
        return redirect()->route('dashboard');
    }
    else
    {
        Toastr::error('Invalid user informations');
        return redirect()->back();
    }
    
}
public function dashboard()
{
    $total_menu = Menu::count();
    return view("backend.dashboard",compact('total_menu'));
}
public function logout()
{
    Auth::logout();
    Toastr::success('wow !! successfully logout');
    return redirect()->route('login.form');
}


}
