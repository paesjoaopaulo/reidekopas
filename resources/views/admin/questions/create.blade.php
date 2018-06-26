@extends('admin.master')
@section('content')
    <h2>Cadastro de Perguntas</h2><br>

    <form class="form" action="{{ route('admin.questoes.store') }}" method="POST">
        {{ csrf_field() }}
        <h5 style="font-weight:bold;">Questão</h5>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="text">Título</label>
                <input type="text-area" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="text">Opção A</label>
                <input type="text-area" class="form-control" id="alt_a" name="alt_a" value="{{old('alt_a')}}">
            </div>
            <div class="form-group col-md-3">
                <label for="text">Opção B</label>
                <input type="text" class="form-control" id="alt_b" name="alt_b" value="{{old('alt_b')}}">
            </div>
            <div class="form-group col-md-3">
                <label for="text">Opção C</label>
                <input type="text" class="form-control" id="alt_c" name="alt_c" value="{{old('alt_c')}}">
            </div>
            <div class="form-group col-md-3">
                <label for="text">Opção D</label>
                <input type="text" class="form-control" id="alt_d" name="alt_d" value="{{old('alt_d')}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="text">Opção Correta</label>
                <input type="text" class="form-control" id="correct_answer" name="correct_answer"
                       value="{{old('correct_answer')}}">
            </div>
            <div class="form-group col-md-4">
                <label for="text">Ano</label>
                <input type="Number" class="form-control" id="year" name="year" value="{{old('year')}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <button class="btn btn-info" type="submit">Enviar</button>
            </div>
        </div>
    </form>
@endsection
