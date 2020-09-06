@extends('app')
@section('content')
    {{$info ?? ''}}
    @include('part.Pizza')
@endsection
