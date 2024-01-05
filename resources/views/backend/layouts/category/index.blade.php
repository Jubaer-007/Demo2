
@extends('backend.master')

@section('content')
<section class="department">
    <div class="row">
        <div class="col-md-12">
            <div class="card  shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Categorys List</h3>
                <a class="btn btn-primary py-2" href="{{ route('category.create') }}">+Add New</a>
            </div>
                <div class="card-body ">
                    <div class="">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id=0;
                        @endphp
                      @foreach($categories as $category)
                        <tr>
                            <td>{{++$id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status == 1 ? "Active" :"Inactive"}}</td>
                            
                            <td class="d-flex ">
                                <a href="{{route('category.show',$category->id)}}" class="btn btn-primary me-1"> <i class="fa fa-eye"></i></a>
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-info me-1"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{route('category.destroy',$category->id)}}" method="post">
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
    </div>
</section>

{{$categories->links()}}
@endsection
