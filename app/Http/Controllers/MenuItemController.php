<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class menuItemController extends Controller
{
    public function index(){
        $menuItems=MenuItem::with('menu')->get();
        return view('backend.layouts.menuItem.index', compact('menuItems'));
    }
    public function create(){
        $menus= Menu::all();
        return view('backend.layouts.menuItem.create',compact('menus'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'menu_id'           =>'required',
            'description'        =>'required',
            'name'              =>'required',
            'price'             =>'required',
            'image'             =>'required',
            
        ]);
        $fileName=null;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/menuItems'),$fileName);
        }
        MenuItem::create([
            'menu_id'=>$request->menu_id,
            'itemdescription'=>$request->description,
            'price'   =>$request->price,
            'itemName'   =>$request->name,
            'image'   =>$fileName,
        ]);
        Toastr::success('successfully created', 'menuItem');
        return redirect()->route('menuItem.index');
    }
    public function show($id){
        $menuItem=menuItem::find($id);
        $menus= Menu::all();
        return view('backend.layouts.menuItem.show',compact('menuItem','menus'));
    }
    public function edit($id){
        $menuItem=menuItem::find($id);
        $menus = Menu::all();
        return view('backend.layouts.menuItem.edit',compact('menuItem','menus'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'menu_id'           =>'required',
            'description'        =>'required',
            'name'              =>'required',
            'price'             =>'required',
            'image'             =>'required',
            
        ]);
        $fileName=$request->image;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('Ymdhi'.'-'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/menuItems'),$fileName);
        }
        $menuItem=MenuItem::find($id);
        $menuItem->update([
            'menu_id'=>$request->menu_id,
            'itemdescription'=>$request->description,
            'price'   =>$request->price,
            'itemName'   =>$request->name,
            'image'   =>$fileName,
        ]);
        Toastr::success('successfully updated', 'menuItem');
        return redirect()->route('menuItem.index');
        
    }
    public function destroy($id){
        menuItem::destroy($id);
        Toastr::error('successfully deleted', 'menuItem');
        return redirect()->back();
}
}