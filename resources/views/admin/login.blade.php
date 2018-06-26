<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Floating labels example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/labels.css')}}" rel="stylesheet">
</head>

<body>
<form class="form-signin" action="{{route('admin.login')}}" method="post">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">REI DE KOPAS</h1>
    </div>

    <div class="form-label-group">
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus>
        <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
        <label for="inputPassword">Password</label>
    </div>
    {{csrf_field()}}
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
</form>
</body>
</html>
