<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editar Perguntas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
{{$errors}}
  <header>
    <div class="row">
      <div class="form-group col-md-6">
        <img src="img-qualquer.png" class="img-responsive" alt="Image">
      </div>
      <div class="form-group col-md-6">
        <img src="img-qualquer.png" class="img-responsive" alt="Image">
      </div>
    </div>
  </header>
  <h2>Editar Perguntas</h2><br>
  
  <form class="form" action="{{ route('properties.update', $property) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
  <h5 style="font-weight:bold;">Editar Perguntas</h5>
  <div class="row">
    <div class="form-group col-md-12">
      <label for="text">Título:</label>
      <input type="text-area" class="form-control" id="title" name="title" value="{{$property->title}}">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="text">Opção A:</label>
      <input type="text-area" class="form-control" id="alt_a" name="alt_a" value="{{$property->alt_a}}">
    </div>
    <div class="form-group col-md-3">
      <label for="text">Opção B:</label>
      <input type="text" class="form-control" id="alt_b" name="alt_b" value="{{$property->alt_b}}">
    </div>
    <div class="form-group col-md-3">
      <label for="text">Opção C:</label>
      <input type="text" class="form-control" id="alt_c" name="alt_c" value="{{$property->alt_c}}">
    </div>
    <div class="form-group col-md-3">
      <label for="text">Opção D:</label>
      <input type="text" class="form-control" id="alt_d" name="alt_d" value="{{$property->alt_d}}">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      <label for="text">Opção Correta:</label>
      <input type="text" class="form-control" id="correct_answer" name="correct_answer" value="{{$property->correct_answer}}">
    </div>
    <div class="form-group col-md-4">
      <label for="text">Ano:</label>
      <input type="Number" class="form-control" id="year" name="year" value="{{$property->year}}">
    </div>
    <div class="form-group col-md-4">
      <label for="text">Imagem:</label>
      <input type="file" class="form-control" id="url_image" name="url_image" value="{{$property->url_image}}">
    </div>
  </div>
  <div class="row">
    <button class="btn btn-info" type="submit">Enviar</button>
  </div>
  </div>
  </form>
</div>
</body>
</html>
