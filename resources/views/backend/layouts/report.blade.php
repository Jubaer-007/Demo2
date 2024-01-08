@extends('backend.master')

@section('content')

<div class="row">
  <div class="col-md-10 offset-md-1">
    <div class="card m-3 p-3">
      <div class="card-body">
        <h2 class="text-center"><strong>Create Order Report</strong></h2>
        <hr class="mb-3">

          <form action="{{route('report.search')}}" method="get">
              @csrf

            <div class="row">
                <div class="col-md-4">
                  <label><strong>From Date</strong></label>
                    <input type="date" name="form_date" class="form-control" value="{{request()->form_date}}">
                </div>
                <div class="col-md-4">
                    <label><strong>To Date</strong></label>
                    <input type="date" name="to_date" class="form-control" value="{{request()->to_date}}">
                </div>
            
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success mt-4">Search</button>
                </div>
              </div>
          </form>
  <div id="orderReport">
    <h2 class="mt-4"><strong>Report of - {{request()->form_date}} to {{request()->to_date}}</strong></h2>
    <hr>

    <table class="table table-bordered" >
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
                        <th scope="col">Payment Method</th>
                        <th scope="col">Total</th>
                        
                       
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id=0;
                        @endphp
                    
                      @foreach($orderReport as $order)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>{{$order->customer->name ?? ''}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->date}}</td>
                            <td>{{$order->time}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->total}}</td>
                              
                        </tr>
                      @endforeach
                    </tbody>
                </table>
</div>
<div class="d-grid gap-2">
    <button onclick="printDiv('orderReport')" class="btn btn-outline-info">Print</button>

    <script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
</div>
</div>
 </div>
 </div>
@endsection