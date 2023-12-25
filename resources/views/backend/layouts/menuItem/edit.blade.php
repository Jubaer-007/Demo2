@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Edit MenuItem</strong></h1>
                    <div class="card-body">
                        <form action="{{route('menuItem.update',$menuItem->id)}}" method="post" >
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="">MenuItem Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="menu Name" value="{{$menuItem->itemName}}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            <div>
                                <label for="">Select Menu</label>
                                <select name="menu_id" id="" class="form-control">
                                    @foreach($menus as $id=>$menu)
                                    <option @if ($menu->id == $menuItem->menu_id)checked
                                        
                                    @endif value="{{$menu->id}}">{{$menu->menuName}}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div class="mb-3">
                                <label for="">Price:</label>
                                   <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="price" value="{{$menuItem->price}}">

                                     @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image:</label>
                                   <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"  value="{{$menuItem->image}}">

                                     @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description:</label>
                                   <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{$menuItem->itemDescription}}">

                                     @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                                
           
                            <button type="submit" class="btn btn-md btn-success">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection