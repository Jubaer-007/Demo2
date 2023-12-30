@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Edit Menu </strong></h1>
                    <div class="card-body">
                        <form action="{{route('member.update',$member->id)}}" method="post" >
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="">member Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="member Name" value="{{$member->name}}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Image:</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
  
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                   <option value="1" {{$member->status ==1 ? 'selected' : '' }}>Active</option>
                                   <option value="0" {{$member->status ==0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
           
                            <button style="float:right;" type="submit" class="btn btn-md btn-success">Update</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection