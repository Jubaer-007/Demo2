<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events=Event::with(['team'])->orderBy('id','desc')->paginate(4);
        return view('backend.layouts.event.index', compact('events'));
    }
    public function create(){
        $teams=Team::all();
        return view('backend.layouts.event.create',compact('teams'));
    }
    public function store(Request $request){
        // dd($request->all());
        
        // $request->validate([
        //     'what'          =>'required|string|min:3',
        //     'where'         =>'required|string|min:3',
        //     'date'          =>'required',
        //     'time'          =>'required',
        //     'status'        =>'required|numeric:min:0',
        //     'team_id'        =>'required|numeric:min:0',
           
            
        // ]); 
        

        Event::create([
            'what'          =>$request->what,
            'where'         =>$request->where,
            'date'          =>$request->date,
            'time'          =>$request->time,
            'status'        =>$request->status,
            'team_id'       =>$request->team_id,
          
        ]);
        Toastr::success('successfully created', 'Event');
        return redirect()->route('event.index');
    }
    public function show($id){
        $event=event::find($id);
        
        return view('backend.layouts.event.show',compact('event'));
    }
    public function edit($id){
        $event=Event::find($id);
        return view('backend.layouts.event.edit',compact('event'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'what'          =>'required|string|min:3',
            'where'         =>'required|string|min:3',
            'date'          =>'required|date',
            'time'          =>'required',
            'status'        =>'required|numeric:min:0',
           
            
        ]); 
       
        $event=Event::find($id);
        $event->update([
            'what'          =>$request->name,
            'where'         =>$request->where,
            'date'          =>$request->date,
            'time'          =>$request->time,
            'status'        =>$request->status,
          
        ]);
        Toastr::success('successfully updated', 'Event');
        return redirect()->route('event.index');
        
    }
    public function destroy($id){
        Event::destroy($id);
        Toastr::error('successfully deleted', 'Event');
        return redirect()->back();
        
    }

}