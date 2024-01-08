
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card  shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Order Details</h3>
                
            </div>
                <div class="card-body ">
                    <div class="">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">OrderId</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id=0;
                        @endphp
                      @foreach($orderDetails as $order)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->menu->name ??''}}</td>
                            <td>{{$order->price ??''}}</td>
                            <td>{{$order->qty ??''}}</td>
                            <td>{{$order->subtotal ??''}}</td>
                            
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{$orderDetails->links()}}
@endsection
