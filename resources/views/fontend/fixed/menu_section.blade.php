@extends('fontend.master')

@section('menu')

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
            <div class="card" style="width: 18rem;">
              <img height="300" src="{{url('uploads/menus/',$menu->image)}}" class="card-img-top" alt="image">
              <div class="card-body">
                <h5 class="card-title">{{$menu->menuName}}</h5>
                <p class="card-text">{{$menu->description}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item badge">{{$menu->status}}</li>
              </ul>
            </div>
            </div>
        @endforeach
       </div>
    </section><!-- End Menu Section -->
@endsection
