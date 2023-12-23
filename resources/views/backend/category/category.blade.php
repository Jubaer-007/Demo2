@extends('backend.master')
@section('content')

<div class="container">
    <h2>Category Item</h2>
    <br>
    <a class="btn btn-success" href="{{route('submit')}}">Add New Arms Item</a>
 <br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($armstype as $key=>$item)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->status}}</td>
      <td>{{$item->description}}</td>
      
   
</tr>
    @endforeach
    
    
  </tbody>
</table>



</div>



@endsection