<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sisconv
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('/css/material-kit.css?v=2.0.6') }}" rel="stylesheet" />
  <link href="{{ asset('/css/style_form.css') }}" rel="stylesheet" />

  
</head>

<body class="@yield('body-class')">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="">
        <img src="{{URL::asset('/img/Siscon_icono.png')}}" width="40" alt="logo"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav ml-auto">
          
          @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{ url('register') }}" >
                <i class="material-icons">portrait</i> Registrarse
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}" >
                <i class="material-icons">contact_mail</i> Iniciar Sesion
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/" target="_blank" data-original-title="Siguenos en Twitter">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/" target="_blank" data-original-title="Siguenos en Facebook">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/" target="_blank" data-original-title="Siguenos en Instagram">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
          @else
          <li class="nav-item">
              <a class="nav-link" href="{{url('/home')}}" >
                <i class="material-icons">home_work</i> Inicio
              </a>
          </li>
          @role('administrador')
          <li class="nav-item">
              <a class="nav-link" href="{{url('/convocatorias')}}" >
                <i class="material-icons">assignment</i> Convocatorias
              </a>
          </li>
          @endrole
            <li class="dropdown">
              <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  @role('administrador')
                  <li>
                      <a href="{{url('/roles')}}">
                          Gestionar Roles
                      </a>
                  </li>
                  <li>
                      <a href="{{url('/register/receptor')}}">
                          Registrar Receptor
                      </a>
                  </li>
                  <li>
                      <a href="{{url('/register/evaluador')}}">
                          Registrar Evaluador
                      </a>
                  </li>
                  @endrole
                  @role('receptor')
                  <li>
                      <a href="{{url('/home')}}">
                          Convocatorias Asignadas
                      </a>
                  </li>
                  @endrole
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
              
              
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="wrapper">
  @yield('content')
  </div>
  
  <!--   Core JS Files   -->
  <script src="{{ asset('/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/plugins/moment.min.js') }}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
   <!-- Google Maps Plugin   
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/js/material-kit.js?v=2.0.6') }}" type="text/javascript"></script>
</body>

</html>
