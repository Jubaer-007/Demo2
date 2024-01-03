<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Team;
use App\Models\TeamMember;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams=Team::all();
        return view('backend.layouts.team.index', compact('teams'));
    }
    public function create(){
        $members= Member::where('status',1)->get();
        return view('backend.layouts.team.create',compact('members'));
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'          =>'required',
            'status'        =>'required|numeric:min:0',
            
             
        ]);

        $team =Team::create([
            'name'          =>$request->name,
            'status'        =>$request->status,
               
            ]);
            
        foreach($request->members as $member){

            TeamMember::create([
                'team_id'   =>$team->id,
                'member_id'   =>$member,
            ]);
        }

        Toastr::success('successfully created');
        return redirect()->route('team.index');
    }
    public function show($id){
        $team=Team::find($id);
        $team_members = TeamMember::with(['team','member'])
                        ->where('team_id',$team->id)->get();
        return view('backend.layouts.team.show',compact('team','team_members'));
    }
    public function edit($id){

        $team=Team::find($id);
        $members= Member::where('status',1)->get();
        $team_members = TeamMember::with(['team','member'])
                                    ->where('team_id',$team->id)->get();
        return view('backend.layouts.team.edit',compact('team','team_members','members'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        try{
            $request->validate([
                'name'          =>'required',
                'status'        =>'required|numeric:min:0',
    
                
            ]);
           $team =Team::find($id);
            $team->update([
                'name'          =>$request->name,
                'status'        =>$request->status,
                   
                ]);
                
            foreach($request->members as $member){
    
                TeamMember::update([
                    'team_id'   =>$team->id,
                    'member_id'   =>$member,
                ]);
            }
    
            Toastr::success('successfully update');
            return redirect()->route('team.index');

        }catch(\Exception $e){
            Toastr::error('Something went wrong.'.$e->getMessage());
            return redirect()->back();
        }
        
    }
    public function destroy($id){
        Team::destroy($id);
        Toastr::error('successfully deleted', 'Team');
        return redirect()->back();
        
    }
}
