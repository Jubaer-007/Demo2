
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card  shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Orders List</h3>
               
            </div>
                <div class="card-body ">
                    <div class="">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Confirm Status</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Total</th>
                        
                       
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id=0;
                        @endphp
                      @foreach($orders as $order)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>{{$order->customer->name ?? ''}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->date}}</td>
                            <td>{{$order->time}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>
                                <form action="{{route('order.confirm',$order->id)}}" method="post">
                                    @csrf
                                    <!-- <option value="confirm" name="comfirm"></option> -->
                                    <!-- <input name="confirm" value="confirm" type="text"> -->
                                    @if ($order->payment_status == 'pending')
                                        
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                    @elseif ($order->payment_status == 'confirm')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                    @endif
                                </form>
                            </td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->total}}</td>
                              
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

{{$orders->links()}}
@endsection
