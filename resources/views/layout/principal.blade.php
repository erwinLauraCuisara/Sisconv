<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SisCon</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Agregando referencia bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="Stylesheet">
        <!-- fin botstrap -->
            
        <!-- Styles -->
        <link href="{{asset('css/style_principal.css')}}" rel="Stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
     <!-- Agregando navbar footer -->
     <nav class="navbar navbar-expand-lg navbar-light nav-color" style="padding: 0px 15px 0px 15px;">
        <a class="navbar-brand" href="" style="width: 3%; padding:0">
            <img src="{{URL::asset('/img/Siscon_icono.png')}}" alt="logo" class="img-logo">
        </a>
        <a class="nav-titulo my-nav" href="">SisCon</a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="my-nav-otros nav-otros" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="my-nav-otros nav-otros" href="#">Convocatorias</a>
            </li>
            </ul>
            <ul class="navbar-nav">
            <li class="nav-item" style="float:right">
                <a class="my-nav-otros nav-otros" href="#">Registrar</a>
            </li>
            <li class="nav-item" style="float:right">
                <a class="my-nav-otros nav-otros" href="#">Iniciar Sessión</a>
            </li>
            </ul>
        </div>
     </nav>

<!-- termina codigo bootstraap navbar -->
            @yield('content')
     
<footer class="page-footer font-small blue pt-4">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2018 Copyright:
  <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
    </body>
</html>