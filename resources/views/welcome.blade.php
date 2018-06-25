<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rei de Kopas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <div id="app">
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" width="400px" height="100px;"></a>
        </div>

        @auth
            <div class="alert alert-info">Olá, {{Auth::user()->name}}</div>
        @endauth

        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
            </div>
        @endif

        @yield('content')
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="{{asset('js/roulette.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

@stack('scripts')

</body>
</html>