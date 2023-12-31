<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;



class MenuController extends Controller
{
    public function index(){
        $menus=Menu::with('category')->orderBy('id','desc')->paginate(4);
        return view('backend.layouts.menu.index', compact('menus'));
    }
    public function create(){
        $categories= Category::where('status',1)->get();
        return view('backend.layouts.menu.create',compact('categories'));
    }

   
    public function store(Request $request){
        
    try{

        $request->validate([
           'name'          =>'required',
           'price'         =>'required|numeric|min:0',
           'description'   =>'required|min:10',
           'category_id'   =>'required|min:1',
           'status'        =>'required|numeric',
           'image'         =>'required:image|mimes:jpeg,jpg,svg|max:1048',
       ]);

   
       $fileName=null;
       if($request->hasFile('image'))
       {
           $image=$request->file('image');
           $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
           $image->move(public_path('uploads/menus'),$fileName);
       }
       
       
           Menu::create([
               'name'          =>$request->name,
               'price'          =>$request->price,
               'description'   =>$request->description,
               'category_id'   =>$request->category_id,
               'status'        =>$request->status,
               'image'         =>$fileName
           ]);
       
       Toastr::success('successfully created', 'Menu');
       return redirect()->route('menu.index');

    }catch(Exception $e){
        Toastr::error('Something went wrong! '.$e->getMessage());
        return redirect()->back();
        
    }
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
        try{
            $request->validate([
                  'name'          =>'required',
                  'price'         =>'required|numeric|min:0',
                  'description'   =>'required|string|min:10',
                  'category_id'   =>'required|numeric',
                  'status'        =>'required|numeric',
                  'image'         =>'required:image|mimes:jpeg,jpg,svg|max:1048',
              ]);
              
                  
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

        }catch(Exception $e){
            Toastr::error('Something went wrong! '.$e->getMessage());
        return redirect()->back();
        }
        
    }
    public function destroy($id){
        Menu::destroy($id);
        Toastr::error('successfully deleted', 'Menu');
        return redirect()->back();
        
    }

}
