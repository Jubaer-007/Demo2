@extends('fontend.master')

@section('menuItem')
<section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>MenuItem</h2>
          <p>Check Our Tasty MenuItem</p>
          <hr>
        </div>
   
        <div class="row">
        
        @foreach ($menuItems as $menu)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img height="300" src="{{url('uploads/menuItems/',$menu->image)}}" class="card-img-top" alt="image">
              <div class="card-body">
                <h5 class="card-title"><span>Item Name:</span>{{$menu->itemName}}</h5>
                <p class="card-text"><span>Description:</span>{{$menu->itemDescription}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item badge ">{{$menu->status}}</li>
                <p><span>Price:</span>{{$menu->price}}TK.</p>
                <a class="btn btn-outline-danger p-2" href="">Add To Cart</a>
                <a class="btn btn-info p-2" href="">Item Details</a>
              </ul>
            </div>
            </div>
        @endforeach
       </div>
    </section><!-- End Menu Section -->
@endsection
