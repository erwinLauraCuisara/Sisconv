@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
</div>
  <div class="main main-raised">
    <div class="container">  
      <div class="section"> 
    <div class="container" style="margin-top: 15px">
    <h2 class="text-center">REGISTRAR CONVOCATORIA</h2>
    

    <form action="{{ action('ConvocatoriaController@store') }}" method="POST" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-row " style="margin-top: 15px">
        <div class="form-group bmd-form-group col-md-6">
          <label for="Titulo" class="bmd-label-floating">{{'Titulo de convocatoria'}}</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="fechaIni">{{'Fecha inicio Convocatoria General'}}</label>
          <input type="date" name="fechaIni" class="form-control" id="fechaIni" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="fechaFin">{{'Fecha fin Convocatoria General'}}</label>
          <input type="date" name="fechaFin" class="form-control" id="fechaFin" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group bmd-form-group col-md-6">
          <label for="Area" class="bmd-label-floating">{{'Area'}}</label>
          <input type="text" name="area" class="form-control" id="Area" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="fechaIniBole">{{'Fecha inicio Compra Boleta'}}</label>
          <input type="date" name="fechaIniBole" class="form-control" id="fechaIniBole" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="fechaFinBole">{{'Fecha fin Compra Boleta'}}</label>
          <input type="date" name="fechaFinBole" class="form-control" id="fechaFinBole" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
      </div>
      <div class="form-group ">
        <label for="Descripcion" class="bmd-label-floating">{{'Descripcion'}}</label>
        <textarea class="form-control" name="descripcion" id="Descripcion" rows="3" required></textarea>
        <div class="invalid-feedback">
            Debe llenar el campo
        </div>
      </div>

      
      <br>

        <script type="text/javascript">
          function cambiar(nombre, info){
          var pdrs = document.getElementById(nombre).files[0].name;
            document.getElementById(info).innerHTML = pdrs;

        }
        </script>
        <div class="row text-center">
          <div class="col-md-6 centrear te">
            <label for="imagen" class="subirImagen">
              <img src="{{URL::asset('/img/cargarImagen.png')}}" height="50">
              <i class="fas fa-cloud-upload-alt"></i>
              <p class="texto_imagen_sub">IMAGEN solo JPG</p>
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


  