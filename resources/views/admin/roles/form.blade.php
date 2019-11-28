@extends('layout.principal')
@section('body-class','landing-page sidebar-collapse')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
</div>
  <div class="main main-raised">
    <div class="container">  
      <div class="section">
      <body> 
    <div class="container" style="margin-top: 15px">
    <h2 class="text-center">REGISTRAR ROL</h2>


    <form action="{{ action('RoleController@store') }}" method="POST" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-row " style="margin-top: 15px">
        <div class="form-group bmd-form-group col-md-6">
          <label for="Titulo" class="bmd-label-floating">{{'Nombre del Rol'}}</label>
          <input type="text" name="name" class="form-control" id="name" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
      </div>
     
      <br>
        <div class="col-md-4 ml-auto mr-auto text-center">
          <button type="submit" class="btn btn-primary">Registrar Rol</button>
        </div>
    </form>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>         
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


  