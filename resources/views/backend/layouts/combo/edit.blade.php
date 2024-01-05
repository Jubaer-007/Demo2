@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Edit Combo </strong></h1>
                    <div class="card-body">
                        <form action="{{route('combo.update', $combo->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="">Combo Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Combo Name" value="{{ $combo->name }}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Select Menu</label>
                                <select name="menus[]" class="selectpicker form-control" multiple data-live-search="trueclass">
                                    
                                    @foreach($menu_combos as $id=>$item)
                                     <option  value="{{$item->id}}">{{$item->menu->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="mb-3">
                                <label for="">Price:</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="price" value="{{$combo->price}}">
                                
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                          
                                <div class="mb-3">
                                    <label for="">Description:</label>
                                       <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{$combo->description}}">
    
                                         @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                </div>
                            <div class="mb-3">
                                <label for="">Image:</label>
                                   <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{$combo->image}}">

                                     @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                   <option value="1" {{$combo->status ==1 ? 'selected' : '' }}>Active</option>
                                   <option value="0" {{$combo->status ==0 ? 'selected' : '' }}>Inactive</option>
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

