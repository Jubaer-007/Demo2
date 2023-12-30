<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams=Team::with('member')->get();
        return view('backend.layouts.team.index', compact('teams'));
    }
    public function create(){
        $members= Member::where('status',1)->get();
        return view('backend.layouts.team.create',compact('members'));
    }
    public function store(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'name'          =>'required',
        //     'price'          =>'required|numeric|min:0',
        //     'description'   =>'required|string|min:10',
        //     'category_id'   =>'required|numeric|min:0',
        //     'status'        =>'required|numeric:min:0',
        //     'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
            
        // ]);

        Team::create([
            'name'          =>$request->name,
            'member_id'   =>$request->member_id,
            'status'        =>$request->status,
            
        ]);
        Toastr::success('successfully created', 'Team');
        return redirect()->route('team.index');
    }
    public function show($id){
        $team=Team::find($id);
        
        return view('backend.layouts.team.show',compact('team'));
    }
    public function edit($id){
        $team=team::find($id);
        $members= Member::where('status',1)->get();
        return view('backend.layouts.team.edit',compact('team','members'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        /* $request->validate([
            'name'          =>'required',
            'price'          =>'required|numeric|min:0',
            'description'   =>'required|string|min:10',
            'category_id'   =>'required|numeric|min:0',
            'status'        =>'required|numeric:min:0',
            'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
            
        ]); */
       
        $team=Team::find($id);
        $team->update([
            'name'          =>$request->name,
            'member_id'     =>$request->member_id,
            'status'        =>$request->status,
        ]);
        Toastr::success('successfully updated', 'Team');
        return redirect()->route('team.index');
        
    }
    public function destroy($id){
        Team::destroy($id);
        Toastr::error('successfully deleted', 'Team');
        return redirect()->back();
        
    }
}
