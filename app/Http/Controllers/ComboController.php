<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    public function index(){
        $combos=Combo::with('menu')->get();
        return view('backend.layouts.combo.index', compact('combos'));
    }
    public function create(){
        $menus= Menu::where('status',1)->get();
        return view('backend.layouts.combo.create',compact('menus'));
    }
    public function store(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'name'          =>'required',
        //     'price'          =>'required|numeric|min:0',
        //     'description'   =>'required|string|min:10',
        //     'menu_id'   =>'required|numeric|min:0',
        //     'status'        =>'required|numeric:min:0',
        //     'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
            
        // ]);

        $fileName=null;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/combos'),$fileName);
        }
        combo::create([
            'name'          =>$request->name,
            'price'          =>$request->price,
            'description'   =>$request->description,
            'menu_id'       =>$request->menu_id,
            'status'        =>$request->status,
            'image'         =>$fileName
        ]);
        Toastr::success('successfully created', 'Combo');
        return redirect()->route('combo.index');
    }
    public function show($id){
        $combo=Combo::find($id);
        
        return view('backend.layouts.combo.show',compact('combo'));
    }
    public function edit($id){
        $combo=Combo::find($id);
        $menus= Menu::where('status',1)->get();
        return view('backend.layouts.combo.edit',compact('combo','menus'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        /* $request->validate([
            'name'          =>'required',
            'price'          =>'required|numeric|min:0',
            'description'   =>'required|string|min:10',
            'menu_id'   =>'required|numeric|min:0',
            'status'        =>'required|numeric:min:0',
            'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
            
        ]); */
        $fileName=$request->image;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/combos'),$fileName);
        }
        $combo=combo::find($id);
        $combo->update([
            'name'          =>$request->name,
            'price'         =>$request->price,
            'description'   =>$request->description,
            'menu_id'       =>$request->menu_id,
            'status'        =>$request->status,
            'image'         =>$fileName
        ]);
        Toastr::success('successfully updated','Combo');
        return redirect()->route('combo.index');
        
    }
    public function destroy($id){
        Combo::destroy($id);
        Toastr::error('successfully deleted','Combo');
        return redirect()->back();
        
    }

}
