@extends('fontend.master')

<style>
    .register{
        margin-top:220px !important;
    }
</style>

@section('content')
<div class="container">
    <div class="row mt-5 p-5 register">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header ">Registration Form</div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="example@gmail.com" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="password" class="form-control" value="{{old('password')}}">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection