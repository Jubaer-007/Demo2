
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Events List</h3>
                <a class="btn btn-primary py-2" href="{{ route('event.create') }}">+Add New</a>
            </div>
                <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">What</th>
                        <th scope="col">Where</th>
                        <th scope="col">date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id=0;
                        @endphp
                      @foreach($events as $event)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>{{$event->what}}</td>
                            <td>{{$event->where}}</td>
                            <td>{{$event->date}}</td>
                            <td>{{$event->time}}</td>
                            <td>{{$event->status == 1 ? "Active" :"Inactive"}}</td>
                            
                            <td class="d-flex ">
                                <a href="{{route('event.show',$event->id)}}" class="btn btn-primary me-1"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('event.edit',$event->id)}}" class="btn btn-info me-1"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{route('event.destroy',$event->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class='btn btn-danger me-1'><i class="fa-solid fa-delete-left"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
