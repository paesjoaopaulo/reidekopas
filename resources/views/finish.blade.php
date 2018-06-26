@extends('welcome')
@section('content')
    <h1>Acertou {{$quiz->goals}} em {{$quiz->spent_time}}s</h1>
    @forelse($quiz->answers as $answer)
        <span>{{$answer->question->title}}</span><br>
        <span>Resposta enviada: {{$answer->answer}} - {{$answer->resposta()}}</span><br>
        @if(!$answer->correct())
        <span>Resposta correta: {{$answer->question->correct_answer}} - {{$answer->question->respostaCerta()}}</span>
        @endif
        <hr>
    @empty
        Nenhuma resposta encontrada
    @endforelse
    <a class="btn btn-success" href="{{route('play')}}">Novo jogo</a>
@endsection