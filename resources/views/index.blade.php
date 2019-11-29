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
                    <p class="card-description">{{$convocatoria->descripcion}}</p>
                  </div>
                  <div class="card-footer justify-content-center">

                    <div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">¿Deseas Actulizar la orden?</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">

                        <div class="col-sm-10">
                            <select class="form-control" name="Status">
                              <option value="1">Pendiente</option>
                              <option value="2">En Proceso</option>
                              <option value="3">Finalizada</option>
                           </select>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
                    
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
