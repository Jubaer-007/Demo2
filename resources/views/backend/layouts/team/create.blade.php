@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="card-header mb-3"><strong> Create Team </strong></h1>
                    <div class="card-body">
                        <form action="{{route('team.store')}}" method="post" >
                            @csrf
                            <div class="mb-3">
                                <label for="">Team Name:</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Team Name" value="{{old('name')}}">
  
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Select Member</label>
                                <select name="members[]" class="selectpicker form-control" multiple data-live-search="trueclass">
                                    @foreach($members as $id=>$member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endforeach
                                </select>
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


@push('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
    
@endpush