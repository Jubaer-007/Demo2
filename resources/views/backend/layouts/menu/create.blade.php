@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Create Menu </strong></h1>
                    <div class="card-body">
                        <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Menu Name:</label>
                                    <input type="text" name="menuName" class="form-control @error('name') is-invalid @enderror" placeholder="Menu Name" value="{{old('menuName')}}">
  
                                    @error('menuName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label for="">Description:</label>
                                   <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{old('description')}}">

                                     @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            <div>
                                <label for="">Select User</label>
                                <select name="user_id" id="" class="form-control">
                                    @foreach($users as $id=>$user)
                                    <option value="{{$user->id}}">{{$user->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                          
                            <div class="mb-3">
                                <label for="">Image:</label>
                                   <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">

                                     @error('image')
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