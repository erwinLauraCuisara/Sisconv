
@extends('layout.principal')
@section('content')

<div  style="padding:3%">
<h1>Secciones</h1>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Titulo</th>
            <th>Nota Maxima</th>
            <th>Punto Numero</th>

        </tr>
    </thead>
    <tbody style="font-weight: bold">
    <label style="display:none">
    {{$secciones=\App\Seccion::where("requerimiento_id","$seccion")->get()}}
    </label>
    @foreach($secciones as $se)

        
        <tr>
            <td>{{$se->titulo}}</td>
            <td>{{$se->NotaMaxima}}</td>
            <td>{{$se->puntoNumero}}</td>
            <td>
                <form action="{{route('secciones.destroy', $se->id)}}" method="post" style="display:inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrar esta seccion?')">Borrar</button>
                </form>
              </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<br>



<form action="{{route('secciones.agregar', $seccion)}}" method="get" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <br>
<hr style="border-top: 3px double #8c8b8b">
<br>
    <h2>¿Desea agregar nuevas secciones?</h2>
    <div class="form-group col-md-6">
          <label for="Titulo">{{'Titulo'}}</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
    </div>
        
    <div class="form-group">
        <label for="NotaMaxima">{{'Nota Maxima'}}</label>
        <textarea class="form-control" name="NotaMaxima" id="NotaMaxima" rows="3" required></textarea>
        <div class="invalid-feedback">
            Debe llenar el campo
        </div>
    </div>
    <button type="submit" class="btn btn-success">Agregar Seccion</button>
</form>


<br><br>

<form action="{{route('subsecciones.show', $seccion)}}" method="get" style="display:inline">
<button type="submit" class="btn btn-secondary btn-lg btn-block">Siguiente</button>
</form>

</div>

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

 
@stop
