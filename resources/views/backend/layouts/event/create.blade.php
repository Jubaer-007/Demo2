@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Create event </strong></h1>
                    <div class="card-body">
                        <form action="{{route('event.store')}}" method="post" >
                            @csrf
                            <div class="mb-3">
                                <label for="">What:</label>
                                    <input type="text" name="what" class="form-control @error('name') is-invalid @enderror" placeholder="event Name" value="{{old('name')}}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                         
                           
                            <div class="mb-3">
                                <label for="">Where:</label>
                                <input type="text" name="where" class="form-control @error('where') is-invalid @enderror" placeholder="where" value="{{old('where')}}">
                                
                                @error('where')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                          
                                <div class="mb-3">
                                    <label for="">Date:</label>
                                       <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" placeholder="date" value="{{old('date')}}">
    
                                         @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                </div>
                            <div class="mb-3">
                                <label for="">Time:</label>
                                   <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{old('time')}}" placeholder="Time">

                                     @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Team:</label>
                                  <select name="team_id" class="form-control" id="">
                                    @foreach ($teams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                  </select>
                                     @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
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