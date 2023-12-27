@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h1 class="card-header text-center mb-3"><strong>menu Details</strong></h1>
                <div class="card-body">
                    
                    <h5><span>Image: </span><img width="100" height="100" src="{{url('uploads/menus/',$menu->image)}}" alt="image"></h5>
                    <h5><span>Name: </span>{{$menu->name}}</h5>
                    <h5><span>Category: </span>{{$menu->category->name}}</h5>
                    <h5><span>Description: </span>{{$menu->description}}</h5>
                    <h5><span>Status: </span>{{$menu->price}}</h5>
                    <h5><span>Price: </span>{{$menu->status ==1 ? 'Active': "Inactive"}}</h5>
                    
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection