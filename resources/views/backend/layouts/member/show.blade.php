@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h1 class="card-header text-center mb-3"><strong>member Details</strong></h1>
                <div class="card-body">
                    
                
                     <img width="60" height="60" src="{{url('uploads/members/',$member->image)}}" alt="image">
    
                    <h5><span>Name: </span>{{$member->name}}</h5>
                    <h5><span>Status: </span>{{$member->status ==1 ? "Active":"Inactive"}}</h5>
                    
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection