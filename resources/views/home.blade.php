@extends('welcome')

@section('content')
    <div id="play" class="form-group">
        <a class="btn raised btn-success btn-lg btn-block" href="{{route('play')}}">Jogar</a>
    </div>
    @guest
        <div id="register" class="form-group">
            <a class="btn raised btn-success btn-lg btn-block" href="{{route('register')}}">Registre-se</a>
        </div>
    @endguest
    <div id="ranking" class="form-group">
        <a class="btn raised btn-success btn-lg btn-block" href="{{route('ranking')}}">Ranking</a>
    </div>
    @auth
        <div id="logout" class="form-group">
            <a class="btn raised btn-success btn-lg btn-block" href="{{route('logout')}}">Logout</a>
        </div>
    @endauth
@endsection