@extends('welcome')
@section('content')
    <form action="{{route('roulette', $quiz)}}" method="post">
        <input type="hidden" class="form-control" name="year" autofocus>
        <button class="btn raised btn-success btn-block">Random</button>
        {{csrf_field()}}
    </form>
@endsection