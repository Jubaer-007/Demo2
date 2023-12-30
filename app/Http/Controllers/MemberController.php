<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members=Member::all();
        return view('backend.layouts.member.index', compact('members'));
    }
    public function create(){
        
        return view('backend.layouts.member.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'      =>'required|string',
            'status'    =>'required|numeric|min:0',
           
            
        ]);
        $fileName=null;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/members'),$fileName);
        }
        Member::create([
            'name'      =>$request->name,
            'status'    =>$request->status,
            'image'      =>$request->image
            
        ]);
        Toastr::success('successfully created', 'memeber');
        return redirect()->route('member.index');
    }
    public function show($id){
        $member=Member::find($id);
        return view('backend.layouts.member.show',compact('member'));
    }
    public function edit($id){
        $member=Member::find($id);
      
        return view('backend.layouts.member.edit',compact('member'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $memeber = Member::find($id);
        $request->validate([
            'name'      =>'required|string',
            'status'    =>'required|numeric|min:0',
            
            
        ]);
        $fileName=$request->image;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName= date('ymdhi'.'.'.$image->getClientOriginalExtension());
            $image->move(public_path('uploads/members'),$fileName);
        }
        $memeber->update([
            'name'      =>$request->name,
            'status'    =>$request->status,
            'image'     =>$request->image
            
        ]);
        Toastr::success('successfully updated', 'Memeber');
        return redirect()->route('member.index');
        
    }
    public function destroy($id){
        Member::destroy($id);
        Toastr::error('successfully deleted', 'memeber');
        return redirect()->back();
        
    }
}
