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
        dd($request->all());
        // $request->validate([
        //     'name'          =>'required',
        //     'price'          =>'required|numeric|min:0',
        //     'description'   =>'required|string|min:10',
        //     'category_id'   =>'required|numeric|min:0',
        //     'status'        =>'required|numeric:min:0',
        //     'image'         =>'required:image|mimes:jpeg,jpg,svg|maz:1048',
            
        // ]);

        
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
        $event=event::find($id);
        return view('backend.layouts.event.edit',compact('event'));
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
       
        $event=event::find($id);
        $event->update([
            'what'          =>$request->name,
            'where'         =>$request->where,
            'date'          =>$request->date,
            'time'          =>$request->time,
            'status'        =>$request->status,
          
        ]);
        Toastr::success('successfully updated', 'event');
        return redirect()->route('event.index');
        
    }
    public function destroy($id){
        Event::destroy($id);
        Toastr::error('successfully deleted', 'event');
        return redirect()->back();
        
    }

}