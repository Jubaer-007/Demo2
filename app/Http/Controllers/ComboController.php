<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Menu;
use App\Models\MenuCombo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    public function index(){
        $combos=Combo::orderBy('id','desc')->paginate(4);
       
        return view('backend.layouts.combo.index', compact('combos'));
    }
    public function create(){
        $menus= Menu::where('status',1)->get();
        return view('backend.layouts.combo.create',compact('menus'));
    }
    public function store(Request $request){

        $request->validate([
            'name'          =>'required|min:3',
            'price'         =>'required|numeric|min:0',
            'description'   =>'required|string|min:10',
            'menus*'       =>'required|numeric|min:0',
            'status'        =>'required|numeric:min:0',
            'image'         =>'required:image|mimes:jpeg,jpg,svg|max:1048',
            
        ]);

        $fileName=null;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/combos'),$fileName);
        }
      $combo = Combo::create([
            'name'          =>$request->name,
            'price'          =>$request->price,
            'description'   =>$request->description,
            'status'        =>$request->status,
            'image'         =>$fileName
        ]);

        foreach($request->menus as $menu){

            MenuCombo::create([
                'combo_id'   =>$combo->id,
                'menu_id'   =>$menu,
            ]);
        }
        
        Toastr::success('successfully created', 'Combo');
        return redirect()->route('combo.index');
    }
    public function show($id){
        $combo=Combo::find($id);
        $menu_combos = MenuCombo::with(['menu','combo'])
                                ->where('combo_id',$combo->id)->get();

        return view('backend.layouts.combo.show',compact('combo','menu_combos'));
    }
    public function edit($id){
        $combo=Combo::find($id);
        $menus= Menu::where('status',1)->get();
        $menu_combos = MenuCombo::where('combo_id',$combo->id)->get();
        // dd($menu_combos);

        return view('backend.layouts.combo.edit',compact('combo','menus','menu_combos'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
try{
    $combo =Combo::find($id);
    $request->validate([
        'name'          =>'required|min:3',
        'price'         =>'required|numeric|min:0',
        'description'   =>'required|string|min:10',
        'menus*'       =>'required|numeric|min:0',
        'status'        =>'required|numeric:min:0',
        'image'         =>'required:image|mimes:jpeg,jpg,svg|max:1048',
        
    ]);

    $fileName=null;
    if($request->hasFile('image'))
    {
        $image=$request->file('image');
        $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
        $image->move(public_path('uploads/combos'),$fileName);
    }
  $combo->update([
        'name'          =>$request->name,
        'price'          =>$request->price,
        'description'   =>$request->description,
        'status'        =>$request->status,
        'image'         =>$fileName
    ]);

    foreach($request->menus as $menu){

        MenuCombo::create([
            'combo_id'   =>$combo->id,
            'menu_id'   =>$menu,
        ]);
    }
    
    Toastr::success('successfully updated', 'Combo');
    return redirect()->back();

}catch(\Exception $e){
    Toastr::error('something went wrong!'.$e->getMessage());
    return redirect()->back();
}
        
    }
    public function destroy($id){
        Combo::destroy($id);
        Toastr::error('successfully deleted','Combo');
        return redirect()->back();
        
    }

}
