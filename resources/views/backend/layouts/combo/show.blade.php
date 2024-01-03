@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h1 class="card-header text-center mb-3"><strong>Menu Details</strong></h1>
                <div class="card-body">
                    
                    <h5><img width="200" height="150" src="{{url('uploads/combos/',$combo->image)}}" alt="image"></h5>
                    <h5><span>Name: </span>{{$combo->name}}</h5>

                    <h5><span>Menu: </span>
                    @foreach ($menu_combos as $menu_combo )
                        {{$menu_combo->menu->name ?? "N/A"}} <span>,</span>
                    @endforeach
                    </h5>

                    <h5><span>Description: </span>{{$combo->description}}</h5>
                    <h5><span>Status: </span>{{$combo->price}}</h5>
                    <h5><span>Price: </span>{{$combo->status ==1 ? 'Active': "Inactive"}}</h5>
                    
                  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection