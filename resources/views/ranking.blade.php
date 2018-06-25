@extends('welcome')
@section('content')
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Position</th>
            <th>Nickname</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->nickname}}</td>
                <td>{{$user->pontuacao_total}}</td>
            </tr>
        @empty
            Nenhum jogador encontrado
        @endforelse
        </tbody>
    </table>
@endsection