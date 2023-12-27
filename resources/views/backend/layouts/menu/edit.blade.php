@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Edit Menu </strong></h1>
                    <div class="card-body">
                        <form action="{{route('menu.update',$menu->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="">Menu Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Menu Name" value="{{$menu->name}}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Select Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $id=>$category)
                                    <option value="{{$category->id}}" @if ($category->id == $menu->categroy_id) checked
                                        
                                    @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="mb-3">
                                <label for="">Price:</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="price" value="{{$menu->price}}">
                                
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                          
                                <div class="mb-3">
                                    <label for="">Description:</label>
                                       <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{$menu->description}}">
    
                                         @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                </div>
                            <div class="mb-3">
                                <label for="">Image:</label>
                                   <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ url('uploads/menus/',$menu->image) }}">

                                     @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                   <option value="1" {{$menu->status ==1 ? 'selected' : '' }}>Active</option>
                                   <option value="0" {{$menu->status ==0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
           
                            <button type="submit" class="btn btn-md btn-success">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection