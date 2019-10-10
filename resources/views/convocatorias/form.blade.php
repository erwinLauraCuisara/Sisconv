@extends('layout.principal')
@section('content')

<!DOCTYPE html>
<div class="container" style="margin-top: 15px">

  <html lang="en">
  <div class="p">

  </div>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <h2>Registrar convocatoria</h2>
  </head>

  <body>


    <form action="{{ action('ConvocatoriaController@store') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-row" style="margin-top: 15px">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Titulo de convocatoria</label>
          <input type="text" name="fTitulo" class="form-control" id="inputEmail4">
        </div>
        <div class="form-group col-md-2">
          <label for="inputPassword4">Fecha inicio</label>
          <input type="date" name="fFecIni" class="form-control" id="inputPassword4" placeholder="09/10/2019">
        </div>
        <div class="form-group col-md-2">
          <label for="inputPassword4">Fecha final</label>
          <input type="date" name="fFecFin" class="form-control" id="inputPassword4" placeholder="09/10/2019">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress">Area</label>
          <input type="text" name="fArea" class="form-control" id="inputAddress">
        </div>
        <div class="form-group col-md-2">
          <label for="inputAddress">Gestion</label>

          <input type="date" name="fGest" class="form-control" id="inputPassword4" placeholder="2-2019">

        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Descripcion</label>
        <textarea class="form-control" name="fDescrip" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="fView" data-toggle="toggle">
          Option one is enabled
        </label>
      </div>
      <button type="button" class="btn btn-secondary btn-lg btn-block">Guardad convocatoria</button>
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  </body>
</div>

</html>
@stop