@extends('layout.principal')
@section('content')

<div  style="padding:3%">
<h1>Agregar requerimiento</h1>

<form action="{{route('requerimientos.agregar', $requerimiento)}}" method="get" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">
    {{ csrf_field() }}
     <div class="form-row" style="margin-top: 15px">
        <div class="form-group col-md-6">
          <label for="Titulo">{{'Titulo del Requerimiento'}}</label>
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

          <label for="MaximaNota">{{'Maxima nota'}}</label>
          <input type="text" name="MaximaNota" class="form-control" id="MaximaNota" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="Descripcion">{{'Descripcion'}}</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
        <div class="invalid-feedback">
            Debe llenar el campo
        </div>
      </div>
    <button type="submit" class="btn btn-secondary btn-lg btn-block">Siguiente</button> 
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


  
</div>

@stop
