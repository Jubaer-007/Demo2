<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Combo;
use App\Models\Member;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Event;
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
    $total_category = Category::count();
    $total_combo = Combo::count();
    $total_member = Member::count();
    $total_team = Team::count();
    // $total_event = Event::count();
  
    return view("backend.dashboard",compact('total_menu','total_category','total_combo','total_team','total_member'));
}
public function logout()
{
    Auth::logout();
    Toastr::success('wow !! successfully logout');
    return redirect()->route('login.form');
}


}
