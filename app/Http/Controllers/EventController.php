<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events=Event::all();
        return view('backend.layouts.event.index', compact('events'));
    }
    public function create(){

        return view('backend.layouts.event.create');
    }
    public function store(Request $request){
        // dd($request->all());
        
        $request->validate([
            'what'          =>'required|string|min:3',
            'where'         =>'required|string|min:3',
            'date'          =>'required|date',
            'time'          =>'required',
            'status'        =>'required|numeric:min:0',
           
            
        ]); 
        

        Event::create([
            'what'          =>$request->name,
            'where'         =>$request->where,
            'date'          =>$request->date,
            'time'          =>$request->time,
            'status'        =>$request->status,
          
        ]);
        Toastr::success('successfully created', 'event');
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