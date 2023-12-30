@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Edit Team </strong></h1>
                    <div class="card-body">
                        <form action="{{route('team.update',$team->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="">Team Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Menu Name" value="{{$team->name}}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Select Member</label>
                                <select name="member_id" id="" class="form-control">
                                    @foreach($members as $id=>$member)
                                    <option value="{{$member->id}}" @if ($member->id == $team->member_id) checked
                                        
                                    @endif>{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                          


                            
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                   <option value="1" {{$team->status ==1 ? 'selected' : '' }}>Active</option>
                                   <option value="0" {{$team->status ==0 ? 'selected' : '' }}>Inactive</option>
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