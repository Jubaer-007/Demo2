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
    <div class="row mt-5 p-5 login">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header ">Login Form</div>
                <div class="card-body">
                    <form action="{{ route('customer.login') }}" method="post">
                        @csrf

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input style=" background-color:#bbdae2;" type="email" name="email" placeholder="example@gmail.com" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="">Password</label>
                        <input style=" background-color:#bbdae2;" type="password" name="password" placeholder="password" class="form-control" value="{{old('password')}}">
                    </div>


                    <button type="submit " class="btn btn-outline-light">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection