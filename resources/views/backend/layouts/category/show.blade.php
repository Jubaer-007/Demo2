@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h1 class="card-header text-center mb-3"><strong>Category Details</strong></h1>
                <div class="card-body">
                    
                    
                    <h5><span>Name: </span>{{$category->name}}</h5>
                    <h5><span>Status: </span>{{$category->status ==1 ? "Active":"Inactive"}}</h5>
                    
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection