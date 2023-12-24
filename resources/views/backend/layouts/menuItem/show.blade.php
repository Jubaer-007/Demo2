@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h1 class="card-header text-center mb-3"><strong>menu Details</strong></h1>
                <div class="card-body">
                    
                    <h5><span>Name: </span>{{$menuItem->itemName}}</h5>
                    <h5><span>Menu: </span>{{$menuItem->menu->menuName}}</h5>
                    <h5><span>Description: </span>{{$menuItem->itemDescription}}</h5>
                    <h5><span>Status: </span>{{$menuItem->status}}</h5>
                    <h5><span>Price: </span>{{$menuItem->price}}</h5>
                    <h5><span>Image: </span><img src="{{asset('$menuItem->image')}}" alt=""></h5>
                    
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection