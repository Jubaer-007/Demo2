
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">menus List</h3>
                <a class="btn btn-primary py-2" href="{{ route('menu.create') }}">+Add New</a>
            </div>
                <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Cateogry</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($menus as $key=>$menu)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                <img width="100" height="100" src="{{url('uploads/menus/',$menu->image)}}" alt="image">
                            </td>
                            <td>{{$menu->name}}</td>
                            <td>{{$menu->category->name}}</td>
                            <td>{{$menu->price}}</td>
                            <td>{{$menu->description}}</td>
                            <td>{{$menu->status == 1 ? "Active" :"Inactive"}}</td>
                            
                            <td class="d-flex ">
                                <a href="{{route('menu.show',$menu->id)}}" class="btn btn-primary me-1"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-info me-1"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{route('menu.destroy',$menu->id)}}" method="post">
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
