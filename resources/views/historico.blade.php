@extends('welcome')
@section('content')
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>#</th>
            <th>data</th>
            <th>pontos</th>
        </tr>
        </thead>
        <tbody>
        @forelse($quizzes as $quiz)
            <tr>
                <td>{{$quiz->id}}</td>
                <td>{{$quiz->created_at->format('d/m/Y H:i:s')}}</td>
                <td>{{$quiz->goals}}</td>
            </tr>
        @empty
            Nenhum jogador encontrado
        @endforelse
        </tbody>
    </table>
@endsection