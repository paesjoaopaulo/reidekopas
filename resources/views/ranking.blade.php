@extends('welcome')
@section('content')
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>#</th>
            <th colspan="2">jogador</th>
            <th>pontos</th>
        </tr>
        </thead>
        <tbody>
        @forelse($ranking as $posicao => $user)
            <tr>
                <td>{{$posicao}}</td>
                <td><img class="rk-avatar" src="{{$user->avatar}}" height="50px"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->pontuacao()}}</td>
            </tr>
        @empty
            Nenhum jogador encontrado
        @endforelse
        </tbody>
    </table>
@endsection