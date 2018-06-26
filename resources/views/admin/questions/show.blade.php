<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lista de Perguntas Cadastradas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <h1 style="text-align: center;">Lista de Pessoas Cadastradas</h1>
    <table class="table table-condensed">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Ano</th>

        <tbody>
            <tr>
            <td>{{$data['pessoa']->id}}</td>
            <td>{{$data['pessoa']->title}}</td>
            <td>{{$data['pessoa']->year}}</td>                               
            </tr>
        </tbody>
    </table>
</body>
</html>