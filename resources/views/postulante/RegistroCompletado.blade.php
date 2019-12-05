@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">

<H1>¿Confirmar su inscripcion?</H1>
<form action="{{url('/')}}" method="get" style="display:inline">
<button type="submit" class="btn btn-primary btn-lg btn-block">Confirmar inscripcion</button>
</form>

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

   </div>
    </div>
  </div>
  @end