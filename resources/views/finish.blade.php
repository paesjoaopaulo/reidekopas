@extends('welcome')
@section('content')
    <h1>Acertou {{$quiz->goals}} em {{$quiz->spent_time}}s</h1>
    @forelse($quiz->answers as $answer)
        <span>{{$answer->question->title}}</span>
        <span>{{$answer->question->respostaCerta()}}</span>
        <span>{{$answer->answer}} => {{$answer->question->correct_answer}}</span>
        <br>
    @empty
        Nenhuma resposta encontrada
    @endforelse
    <a href="{{route('play')}}">Novo jogo</a>
@endsection