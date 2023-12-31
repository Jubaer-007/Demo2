@extends('fontend.master')

@section('content')
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
                <h5 class="card-title"><span>Event Name:</span>{{$event->what}}</h5>
                <p class="card-text"><span>Where:</span>{{$event->where}}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item badge ">{{$event->status? "Available" : "NotAvailable"}}</li>
                <p ><span>Date: </span class="badge bg-warning p-3">{{$event->date}}</p>
                <p ><span>Time: </span class="badge bg-warning p-3">{{$event->time}}</p>
                <a class="btn btn-outline-success p-2" href="">Booking</a>
              </ul>
            </div>
            </div>
        @endforeach
       </div>
    </section><!-- End Menu Section -->
@endsection
