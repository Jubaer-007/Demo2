
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">members List</h3>
                <a class="btn btn-primary py-2" href="{{ route('member.create') }}">+Add New</a>
            </div>
                <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id=0;
                        @endphp
                      @foreach($members as $member)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>
                                <img width="60" height="60" src="{{url('uploads/members/',$member->image)}}" alt="image">
                            </td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->status == 1 ? "Active" :"Inactive"}}</td>
                            
                            <td class="d-flex ">
                                <a href="{{route('member.show',$member->id)}}" class="btn btn-primary me-1"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('member.edit',$member->id)}}" class="btn btn-info me-1"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{route('member.destroy',$member->id)}}" method="post">
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
