<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders= Order::orderBy('id','desc')->paginate(4);
      return view("backend.layouts.order",compact('orders'));
    }


    public function orderConfirm(Request $request,$id)
    {
        $update = Order::find($id);
        // dd($update->id);
        if($update->payment_status =='pending'){

            $update->update([
                'payment_status'    =>'confirm'
            ]);
            Toastr::success('Successfully Confirm');
            return redirect()->back();

        }elseif($update->payment_status =='confirm'){
            $update->update([
                'payment_status'    =>'pending'
            ]);
             Toastr::success('Successfully Cancel');
            return redirect()->back();
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
