<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MenuController extends Controller
{
    public function index(){
        $menus=Menu::with('category')->get();
        return view('backend.layouts.menu.index', compact('menus'));
    }
    public function create(){
        $categories= Category::where('status',1)->get();
        return view('backend.layouts.menu.create',compact('categories'));
    }

   
    public function store(Request $request){
    
        /* $validator = Validator::make($request->all(),[
            'name'          =>'required',
            'price'         =>'required|numeric|min:0',
            'description'   =>'required|string|min:10',
            'categories *'   =>'required',
            'status'        =>'required|numeric',
            'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
        ]);
        if($validator->fails())
        {
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back();
        } */



       
        // Your logic to save each selected item
        
        $fileName=null;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/menus'),$fileName);
        }
        
        foreach ($request->categories as $category) {
            
            Menu::create([
                'name'          =>$request->name,
                'price'          =>$request->price,
                'description'   =>$request->description,
                'category_id'   =>$category,
                'status'        =>$request->status,
                'image'         =>$fileName
            ]);
        }
        Toastr::success('successfully created', 'Menu');
        return redirect()->route('menu.index');
    }
    public function show($id){
        $menu=Menu::find($id);
        
        return view('backend.layouts.menu.show',compact('menu'));
    }
    public function edit($id){
        $menu=Menu::find($id);
        $categories= Category::where('status',1)->get();
        return view('backend.layouts.menu.edit',compact('menu','categories'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'          =>'required',
            'price'         =>'required|numeric|min:0',
            'description'   =>'required|string|min:10',
            'category_id'   =>'required|numeric',
            'status'        =>'required|numeric',
            'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
        ]);
        if($validator->fails())
        {
            Toastr::success($validator->getMessageBag()->first());
            return redirect()->back();
        }
            
        $fileName=$request->image;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/menus'),$fileName);
        }
        $menu=Menu::find($id);
        $menu->update([
            'name'          =>$request->name,
            'price'          =>$request->price,
            'description'   =>$request->description,
            'category_id'   =>$request->category_id,
            'status'        =>$request->status,
            'image'         =>$fileName
        ]);
        Toastr::success('successfully updated', 'Menu');
        return redirect()->route('menu.index');
        
    }
    public function destroy($id){
        Menu::destroy($id);
        Toastr::error('successfully deleted', 'Menu');
        return redirect()->back();
        
    }

}
