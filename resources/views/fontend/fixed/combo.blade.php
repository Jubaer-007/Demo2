@extends('fontend.master')

@section('content')
<section id="menu" class="menu section-bg mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Combo</h2>
          <p>Check Our Tasty Combo</p>
          <hr>
        </div>
   
        <div class="row">
        
        @foreach ($combos as $combo)
        <div class="col-md-3">
            <div class="card mb-3">
              <img height="300" src="{{url('uploads/combos/',$combo->image)}}" class="card-img-top" alt="image">
              <div class="card-body">
                <h5 class="card-title"><span><b>Combo Name:</b></span>{{$combo->name}}</h5>
                <h5 class="card-title"><span><b>Menus:</b></span>
                   @foreach ($menu_combos as $menu_combo )
                        {{$menu_combo->menu->name ?? "N/A"}} <span>,</span>
                    @endforeach
                </h5>
                <p class="card-text"><span><b>Description:</b></span>{{$combo->description}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item badge bg-success">{{$combo->status? "Available" : "NotAvailable"}}</li>
                <p ><span><b>Price:</b> </span class="badge bg-warning p-3">{{$combo->price}}BDT.</p>
                <a class="btn btn-outline-danger p-2" href="">Add To Cart</a>
              </ul>
            </div>
            </div>
        @endforeach
       </div>
    </section><!-- End Menu Section -->
@endsection
