<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('backend.layouts.category.index', compact('categories'));
    }
    public function create(){
        
        return view('backend.layouts.category.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'      =>'required|string',
            'status'    =>'required|numeric|min:0',
            
            
        ]);

        Category::create([
            'name'      =>$request->name,
            'status'    =>$request->status,
            
        ]);
        Toastr::success('successfully created', 'Category');
        return redirect()->route('category.index');
    }
    public function show($id){
        $category=Category::find($id);
        return view('backend.layouts.category.show',compact('category'));
    }
    public function edit($id){
        $category=Category::find($id);
      
        return view('backend.layouts.category.edit',compact('category'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'name'      =>'required|string',
            'status'    =>'required|numeric|min:0',
            
            
        ]);
        $category = Category::find($id);
        $category->update([
            'name'      =>$request->name,
            'status'    =>$request->status,
            
        ]);
        Toastr::success('successfully updated', 'category');
        return redirect()->route('category.index');
        
    }
    public function destroy($id){
        Category::destroy($id);
        Toastr::error('successfully deleted', 'Category');
        return redirect()->back();
        
    }
}
