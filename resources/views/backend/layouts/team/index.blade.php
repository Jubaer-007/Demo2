
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow p-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">teams List</h3>
                <a class="btn btn-primary py-2" href="{{ route('team.create') }}">+Add New</a>
            </div>
                <div class="card-body">
                <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($teams as $key=>$team)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$team->name}}</td>
                         
                            
                            <td>{{$team->status == 1 ? "Active" :"Inactive"}}</td>
                            
                            <td class="d-flex ">
                                <a href="{{route('team.show',$team->id)}}" class="btn btn-primary me-1"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('team.edit',$team->id)}}" class="btn btn-info me-1"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{route('team.destroy',$team->id)}}" method="post">
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
{{$teams->links()}}
@endsection
