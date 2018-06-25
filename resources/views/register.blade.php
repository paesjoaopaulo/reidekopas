@extends('welcome') @section('content')
    <form action="{{route('register')}}" method="post" autocomplete="off" enctype="multipart/form-data">
        <fieldset>
            <legend>
                Cadastrar
            </legend>
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                    <div class="help-block">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                    <div class="help-block">{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input class="form-control" type="text" id="nickname" name="nickname" value="{{old('nickname')}}">
                @if($errors->has('nickname'))
                    <div class="help-block">{{$errors->first('nickname')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password">
                @if($errors->has('password'))
                    <div class="help-block">{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar senha</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="image">Imagem</label>
                <input class="form-control" type="file" id="image" name="image">
                @if($errors->has('image'))
                    <div class="help-block">{{$errors->first('image')}}</div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn raised btn-success btn-block">Cadastrar</button>
            </div>
            {{csrf_field()}}
        </fieldset>
    </form>
@endsection