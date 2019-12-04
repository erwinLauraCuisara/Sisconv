@extends('layout.principal')
@section('body-class','landing-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">SISCONV.</h1>
          <h4>Conoce las convocatorias para: Docentes Titulares, Docentes en cursos de invierno o verano, personal administrativo y para auxiliaturas mediante el Sistema SISCONV </h4>
          <br>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h2 class="title">Convocatorias Publicas</h2>
        <div class="team">
          <div class="row">
          @foreach ($convocatorias as $convocatoria)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  
                    <img src="{{ asset(('storage/convocatorias').'/'.$convocatoria->id.'/'.'imagen.jpg') }}" alt="Convocatoria" class="rounded img-raised img-fluid">
                  
                  <h4 class="card-title">{{$convocatoria->titulo}}
                    <br>
                    <small class="card-description text-muted">{{$convocatoria->area}}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description text-muted">{{$convocatoria->descripcion}}</p>
                    <a href="{{ route('convocatorias.show',$convocatoria->id) }}">Ver convocatoria</a>
                  </div>
                  <div class="card-footer justify-content-center">
                  @if (Auth::guest())
                    <form action="{{ url('register') }}" method="get" style="display:inline">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar para postular</button>
                    </form>
                  @else
                  @role('postulante')
                    <form action="{{route('postular.codigo', $convocatoria->id) }}" method="get" style="display:inline">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Postular</button>
                    </form>
                  @endrole
                  @role('administrador')
                    <form action="" method="get" style="display:inline">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ver Convocatoria</button>
                    </form>
                  @endrole
                  @role('receptor')
                    <form action="{{route('receptor.show', $convocatoria->id)}}" method="get" style="display:inline">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ver Postulantes</button>
                    </form>
                  @endrole
                  @role('evaluador')
                    <form action="{{route('evaluador.show', $convocatoria->id)}}" method="get" style="display:inline">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Calificar Postulantes</button>
                    </form>
                  @endrole
                  @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
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
