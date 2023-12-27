<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus=Menu::all();
        return view('backend.layouts.menu.index', compact('menus'));
    }
    public function create(){
        $users= User::all();
        return view('backend.layouts.menu.create',compact('users'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'menuName'=>'required',
            'description'=>'required',
            'user_id'   =>'required',
            'image'   =>'required',
            
        ]);

        $fileName=null;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/menus'),$fileName);
        }
        Menu::create([
            'menuName'=>$request->menuName,
            'description'=>$request->description,
            'user_id'   =>$request->user_id,
            'image'   =>$fileName
        ]);
        Toastr::success('successfully created', 'menu');
        return redirect()->route('menu.index');
    }
    public function show($id){
        $menu=Menu::find($id);
        return view('backend.layouts.menu.show',compact('menu'));
    }
    public function edit($id){
        $menu=Menu::find($id);
        $users = User::all();
        return view('backend.layouts.menu.edit',compact('menu','users'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'menuName'=>'required',
            'description'=>'required',
            'user_id'   =>'required',
            'image'   =>'required',
            
        ]);
        $fileName=$request->image;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/menuItems'),$fileName);
        }
        $menu=Menu::find($id);
        $menu->update([
            'menuName'=>$request->menuName,
            'description'=>$request->description,
            'user_id'   =>$request->user_id,
            'image'   =>$fileName
        ]);
        Toastr::success('successfully updated', 'menu');
        return redirect()->route('menu.index');
        
    }
    public function destroy($id){
        Menu::destroy($id);
        Toastr::error('successfully deleted', 'menu');
        return redirect()->back();
        
    }

}
