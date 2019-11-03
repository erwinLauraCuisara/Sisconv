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
        
        <link href="{{ asset('css/personalizado/bootstrap.min.css') }}" rel="Stylesheet">
        <link href="{{ asset('css/personalizado/style_principal.css') }}" rel="Stylesheet">   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">                
        <!-- fin botstrap -->
            
        <!-- Styles --> 
    </head>
    <body>
     <!-- Agregando navbar footer -->
     
     <nav class="navbar navbar-expand-lg navbar-light nav-color sticky-top" style="padding: 0px 15px 0px 15px;">
        <a class="navbar-brand nav-titulo my-nav" href="{{url('/')}}" >
            <img src="{{URL::asset('/img/Siscon_icono.png')}}" alt="logo" class="d-inline-block aling-top img-logo">
            SisCon
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="my-nav-otros nav-otros" href="{{url('/')}}">Home </a>
            </li>
            <li class="nav-item">
                <a class="my-nav-otros nav-otros" href="{{url('/convocatorias')}}">Convocatorias</a>
            </li>
            </ul>
            <ul class="navbar-nav ml-auto">
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
<img src="{{URL::asset('/img/footer_ima.jpg')}}" alt="footer_img" style="width:100%; height:100px">
<div class="container-fluid text-center text-md-left">
</div>

<!-- Copyright -->
<div class="footer-copyright text-center py-3">
<img src="{{URL::asset('/img/Siscon_icono.png')}}" alt="logo" class="img-logo" style="width:7%;">
<br>    
© 2019 Copyright:
  <a href="#"> A.R.E.S srl</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>