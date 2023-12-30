@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h1 class="card-header text-center mb-3"><strong>Event Details</strong></h1>
                <div class="card-body">
                    
                    <h5><span>What: </span>{{$event->what}}</h5>
                    <h5><span>where: </span>{{$event->where}}</h5>
                    <h5><span>Date: </span>{{$event->date}}</h5>
                    <h5><span>Time: </span>{{$event->time}}</h5>
                    <h5><span>Status: </span>{{$event->status ==1 ? 'Active': "Inactive"}}</h5>
                    
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection