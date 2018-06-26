@extends('admin.master')
@section('content')
    <h2>Perguntas</h2><br>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>#</th>
            <th>Ano</th>
            <th>Título</th>
            <th>Alternativa A</th>
            <th>Alternativa B</th>
            <th>Alternativa C</th>
            <th>Alternativa D</th>
            <th>Resposta</th>
        </tr>
        </thead>
        <tbody>
        @forelse($questions as $question)
            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->year}}</td>
                <td>{{$question->title}}</td>
                <td>{{$question->alt_a}}</td>
                <td>{{$question->alt_b}}</td>
                <td>{{$question->alt_c}}</td>
                <td>{{$question->alt_d}}</td>
                <td>{{$question->correct_answer}}</td>
            </tr>
        @empty
            Nenhuma questão cadastrada
        @endforelse
        </tbody>
    </table>
@endsection
