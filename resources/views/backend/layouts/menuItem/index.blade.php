
@extends('backend.master')

@section('content')
<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">MenuItems List</h3>
                <a class="btn btn-primary py-2" href="{{ route('menuItem.create') }}">+Add New</a>
            </div>
                <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($menuItems as $key=>$menu)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$menu->itemName}}</td>
                            <td>{{$menu->price}}</td>
                            <td>{{$menu->itemDescription}}</td>
                            <td class="text-success ">{{$menu->status}}</td>
                            <td class="d-flex">
                                <a href="{{route('menuItem.show',$menu->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('menuItem.edit',$menu->id)}}" class="btn btn-info">Edit</a>
                                <form action="{{route('menuItem.destroy',$menu->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class='btn btn-danger'>Delete</button>
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
