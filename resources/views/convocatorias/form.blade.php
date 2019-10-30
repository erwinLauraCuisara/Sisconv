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
    <link href="{{asset('css/style_form_conv.css')}}" rel="Stylesheet"> 
  </head>

  <body>
  <h2>REGISTRAR CONVOCATORIA</h2>


    <form action="{{ action('ConvocatoriaController@store') }}" method="POST" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-row" style="margin-top: 15px">
        <div class="form-group col-md-6">
          <label for="Titulo">{{'Titulo de convocatoria'}}</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
        <div class="form-group col-md-2">
          <label for="fechaIni">{{'Fecha inicio'}}</label>
          <input type="date" name="fechaIni" class="form-control" id="fechaIni" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
        <div class="form-group col-md-2">
          <label for="fechaFin">{{'Fecha final'}}</label>
          <input type="date" name="fechaFin" class="form-control" id="fechaFin" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">

          <label for="Area">{{'Area'}}</label>
          <input type="text" name="area" class="form-control" id="Area" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="Descripcion">{{'Descripcion'}}</label>
        <textarea class="form-control" name="descripcion" id="Descripcion" rows="3" required></textarea>
        <div class="invalid-feedback">
            Debe llenar el campo
        </div>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="visible" id="visible" value="1">
          Publicado
        </label>

      </div>

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
          <!--<div >
            <label for="imagen" style="padding: 5px 10px; background: #f55d3e; color: #fff; border: 0px solid "><img src="{{URL::asset('/img/cargarImagen.png')}}" height="50"> <input type="file" name="imagen" > </label>
          
            <p >Adjuntar documento<input type="file" name="pdf"></p>

          </div>
        -->
        <script type="text/javascript">
          function cambiar(nombre, info){
            var limTam=0;
            if(nombre=="imagen"){
              limTam=2048
            }
            else{
              limTam=8192
            }
            var file=document.getElementById(nombre).files[0];
            var salida = document.getElementById(info);
            if(file.size/1024>limTam){
              document.getElementById(nombre).value = "";
              salida.classList.add("existe-error");
              salida.innerHTML= "archivo muy grande";
            }
            else{
              salida.classList.remove("existe-error");
              var pdrs = file.name;
              document.getElementById(info).innerHTML = pdrs;
            }
          

        }
        </script>
        <div class="row">
        <div class="col-md-6 centrear">
          <label for="imagen" class="subirImagen">
            <img src="{{URL::asset('/img/cargarImagen.png')}}" height="50">
            <i class="fas fa-cloud-upload-alt"></i>
            <p class="texto_imagen_sub">IMAGEN</p>
          </label> 
          <input id="imagen" name="imagen" onchange='cambiar("imagen","info")' type="file" 
          style='display: none;' accept="image/*"/>
          <div id="info"></div>
        </div>  
        <div class="col-md-6 centrear">
        <label for="pdf" class="subirPdf">
          <img src="{{URL::asset('/img/subirPdf.png')}}" height="50">
          <i class="fas fa-cloud-upload-alt"></i> 
          <p class="texto_imagen_sub">PDF</p>
        </label>
        <input id="pdf" name="pdf" onchange='cambiar("pdf","ref")' type="file" 
        style='display: none;' accept="application/pdf"/>
        <div id="ref"></div>
        </div>
        </div>

      <button type="submit" class="btn btn-secondary btn-lg btn-block">Guardar convocatoria</button>

    </form>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</div>

</html>
@stop