@extends('welcome') @section('content')
    <form action="{{route('login')}}" method="post" autocomplete="off">
        <fieldset>
            <legend>
                Login
            </legend>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="{{old('email')}}" tabindex="1" autofocus>
                @if($errors->has('email'))
                    <div class="help-block">{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" tabindex="2">
                @if($errors->has('password'))
                    <div class="help-block">{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="form-group">
                {{csrf_field()}}
                <button class="btn raised btn-success btn-block" tabindex="3">Login</button>
            </div>
        </fieldset>
    </form>
@endsection