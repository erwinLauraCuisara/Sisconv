@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
</div>
  <div class="main main-raised">
    <div class="container">  
      <div class="section"> 
    <div class="container" style="margin-top: 15px">
    <h2 class="text-center">Ingrese su codigo para poder registrarse a esta convocatoria</h2>
    <br><br>
    @if(isset($mensaje))
        {{$mensaje}}
    @endif
    <form action="{{route('postular.getRequisitosIndispensables', $idConvocatoria) }}" method="get" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-row " style="margin-top: 15px">
        <div class="form-group bmd-form-group col-md-6">
          <label for="codigo" class="bmd-label-floating">{{'Ingrese el codigo de la convocatoria'}}</label>
          <input type="text" name="codigo" class="form-control" id="codigo" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
      </div>
        <script type="text/javascript">
          function cambiar(nombre, info){
          var pdrs = document.getElementById(nombre).files[0].name;
            document.getElementById(info).innerHTML = pdrs;

        }
        </script>
        <div class="col-md-4 ml-auto mr-auto text-center">
          <button type="submit" class="btn btn-primary ">Siguiente</button>
        </div>
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
    </div>
  </div>
<footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="">
                SISCONV
              </a>
            </li>
            <li>
              <a href="">
                Acerca de nosotros
              </a>
            </li>
            <li>
              <a href="">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>Sisconv <i class="material-icons"> laptop </i> <i class="material-icons"> smartphone </i>Sistema de Convocatorias
        </div>
      </div>
  </footer>


  