@extends('app')
@section('content')
    <form method="post" action="sugnin" novalidate>
        @csrf
        @if(isset($info))
            <div class="alert alert-primary" role="alert">
               {{$info}}
            </div>
        @endif
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
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            @if($errors->has('password'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('password')}}
                </div>
            @endif
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1" name="remember">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
