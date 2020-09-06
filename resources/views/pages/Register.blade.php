@extends('app')
@section('content')
    <form method="post" action="register">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   name="email">
            @if($errors->has('email'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('email')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   name="name">
            @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        @if($errors->has('password'))
            <div class="alert alert-danger" role="alert">
                {{$errors->first('password')}}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
