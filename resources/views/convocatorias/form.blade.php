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


    <form action="{{ action('ConvocatoriaController@store') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-row" style="margin-top: 15px">
        <div class="form-group col-md-6">

          <label for="Titulo">{{'Titulo de convocatoria'}}</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo">
        </div>
        <div class="form-group col-md-2">
          <label for="fechaIni">{{'Fecha inicio'}}</label>
          <input type="date" name="fechaIni" class="form-control" id="fechaIni" placeholder="09/10/2019">
        </div>
        <div class="form-group col-md-2">
          <label for="fechaFin">{{'Fecha final'}}</label>
          <input type="date" name="fechaFin" class="form-control" id="fechaFin" placeholder="09/10/2019">

        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">

          <label for="Area">{{'Area'}}</label>
          <input type="text" name="area" class="form-control" id="Area">
        </div>
        <div class="form-group col-md-2">
          <label for="inputAddress">{{'Gestion'}}</label>
          <!-- 
          <input type="date-yyyy" name="fGest" class="form-control" id="inputPassword4" placeholder="2-2019">-->
        </div>
      </div>
      <div class="form-group">
        <label for="Descripcion">{{'Descripcion'}}</label>
        <textarea class="form-control" name="descripcion" id="Descripcion" rows="3"></textarea>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="visible" id="visible" value="1">
          publicado
        </label>
      </div>-->

      <!--subir archivo-->
      
         <!-- <div class="file-field">
            <div class="z-depth-1-half mb-4">
              <img src="{{URL::asset('/img/cargar.png')}}" class="img-fluid"
                alt="example placeholder">
            </div>
            <div class="d-flex justify-content-center">
              <div class="btn btn-mdb-color btn-rounded float-left">
                <span>Choose file</span>
                <input type="file" name="imagen">
              </div>
            </div>
          </div>
        
        
          <div class="file-field">
            <div class="mb-4">
              <img src="{{URL::asset('/img/cargarImagen.png')}}"
                class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
            </div>
            <div class="d-flex justify-content-center">
              <div class="btn btn-mdb-color btn-rounded float-left">
                <span>Add photo</span>
                <input type="file" name="pdf">
              </div>
            </div>
          </div>  -->
          <div>
            <p >Adjuntar Imagen:  <input type="file" name="imagen"> </p>
          
            <p >Adjuntar documento<input type="file" name="pdf"></p>

          </div>


        


      <button type="submit" class="btn btn-secondary btn-lg btn-block">Guardar convocatoria</button>

    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  </body>
</div>

</html>
@stop