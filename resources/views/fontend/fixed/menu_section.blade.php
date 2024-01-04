@extends('fontend.master')


@section('content')

<section id="menu" class="menu section-bg mt-5">
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
@endsection