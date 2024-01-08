@extends('fontend.master')

@include('fontend.fixed.hero')

@section('content')
<section id="menu" class="menu section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Menu</h2>
      <p>Check Our Tasty Menu</p>
      <hr>
    </div>

    <div class="row">
      
      @foreach ($menus as $menu)
        
          <div class="col-md-3">
          <div class="card mb-3">
      <img height="200px" src="{{ url('uploads/menus/',$menu->image)}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><span>Menu: </span>{{$menu->name}}</h5>
        <p class="card-text"><span>Descriptions: </span>{{ $menu->description }}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><span>Category: </span>{{$menu->category->name}}</li>
        <li class="list-group-item"><span>Status: </span>{{$menu->status ? "Available" : "No Available"}}</li>
        <li class="list-group-item badge bg-warning p-3"><span style="font-size:14px">Price: </span style="font-size:14px">{{$menu->price}} BDT.</li>
      </ul>
      <div class="card-body">
        
        <a href="{{route('add.to.cart',$menu->id)}}" class="card-link btn btn-danger">Add To Cart</a>
      </div>
    </div>
      </div>
      @endforeach

    </div>
</section><!-- End Menu Section -->


<section id="menu" class="menu section-bg">
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
                <p class="card-text"><span>Description:</span>{{$combo->description}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item badge bg-success">{{$combo->status? "Available" : "NotAvailable"}}</li>
                <p><span><b>Price:</b> </span>{{$combo->price}}BDT.</p>
                <a class="btn btn-outline-danger p-2" href="">Add To Cart</a>
              </ul>
            </div>
            </div>
        @endforeach
       </div>
    </section><!-- End Menu Section -->



    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Event</h2>
          <p>Check Our Event</p>
          <hr>
        </div>
   
        <div class="row">
        
        @foreach ($events as $event)
        <div class="col-md-3">
            <div class="card mb-3">
            
              <div class="card-body">
                <h5 class="card-title"><span><b>Event:</b></span>{{$event->what}}</h5>
                <p class="card-text"><span><b>Where:</b></span>{{$event->where}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item badge bg-success ">{{$event->status? "Available" : "NotAvailable"}}</li>
                <p ><span><b>Date:</b> </span class="badge bg-warning p-3">{{$event->date}}</p>
                <p ><span><b>Time:</b> </span class="badge bg-warning p-3">{{$event->time}}</p>
                <a class="btn btn-outline-success p-2" href="">Book</a>
              </ul>
            </div>
            </div>
        @endforeach
       </div>
    </section><!-- End Menu Section -->
@endsection
