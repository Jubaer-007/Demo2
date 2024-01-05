@extends('fontend.master')

@section('content')
<style>
    .checkout{
      background-color: #7c7c7c;
      margin-top:150px;
    }
</style>
<div class="container checkout">
      <div class="py-2 text-center">
         <h2>Checkout form</h2>
         <hr>
        </div>

      <div class="row p-3">
        <div class="col-md-4 order-md-2">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"> {{session()->has('cart')?count(session()->get('cart')):0}}</span>
          </h4>
          <ul class="list-group mb-3">
            

        @if(session()->has('cart'))
          @foreach(session()->get('cart') as $cart)
          <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$cart['name']}}</h6>
                
              </div>
              <span class="text-muted">{{$cart['price']}} BDT</span>
            </li>
            @endforeach
        @endif
            

            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>{{session()->has('cart') ? array_sum(array_column(session()->get('cart'),'sub_total')):0}}</strong>
            </li>
          </ul>

          
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          
          <form class="needs-validation" action="{{route('place.order')}}" method="post" >
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="" required>
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="time">Time</label>
                <input name="time" type="time" class="form-control" id="time" placeholder="" value="" required>
                
              </div>
            </div>

            <div class="mb-3">
              <label for="date">Date <span class="text-muted"></span></label>
              <input name="date" type="date" class="form-control" id="date" >
              
            </div>
            

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
              
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input name="address" type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              
            </div>

            

           
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input value="ssl" id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">SSL Commerz</label>
              </div>
              <div class="custom-control custom-radio">
                <input value="cod" id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">COD</label>
              </div>
              
            </div>
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>



        </div>
      </div>

      
    </div>

@endsection