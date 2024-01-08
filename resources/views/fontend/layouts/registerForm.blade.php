@extends('fontend.master')



@section('content')

<style>
    .card{
      background-color:#436770;
      margin-top:120px;
      color:#fff;
    }
</style>
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
                        <input style=" background-color:#bbdae2;" type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input style=" background-color:#bbdae2;" type="email" name="email" placeholder="example@gmail.com" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="">Password</label>
                        <input style=" background-color:#bbdae2;" type="password" name="password" placeholder="password" class="form-control" value="{{old('password')}}">
                    </div>

                    <a style="text-decoration:underline;" href="{{route('customer.loginForm')}}">Already have an account?</a><br><br>
                    <button type="submit" class="btn btn-outline-light">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection