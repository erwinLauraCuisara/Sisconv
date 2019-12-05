@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h2 class="title">Convocatorias Publicas</h2>
        <div class="team">
          <div class="row">
          <a href="{{url('convocatorias/create')}}" class="btn btn-success" >Agregar Convocatoria</a>
            <table class="table">
             <thead>
                 <tr>
                    
                    <th class="text-center">Id</th>
                    <th>Titulo</th>
                    <th>Area</th>
                    <th>Fecha Publicacion</th>
                    <th>Fecha Finalizacion</th>
                    <th>Codigo</th>
                    <th class="text-right">Acciones</th>
                 </tr>
             </thead>
                <tbody>
                @foreach($convocatorias as $convocatoria)
                    <tr>
                      <td>
                      <?php      
                        if(($convocatoria->visible)==true)
                            echo "Si";
                        else
                            echo "No";
                      ?>
                      </td>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td>{{$convocatoria->titulo}}</td>
                      <td>{{$convocatoria->area}}</td>
                      <td>{{$convocatoria->fechaIni}}</td>
                      <td>{{$convocatoria->fechaFin}}</td>
                      <td>{{$convocatoria->codigo}}</td>
                      <td class="td-actions text-right">
                          <a href="" rel="tooltip" title="Ver Convocatorias" class="btn btn-info btn-fab btn-round">
                              <i class="material-icons">info</i>
                          </a>
                          <a href="" rel="tooltip" title="Editar Convocatorias" class="btn btn-success btn-fab btn-round">
                              <i class="material-icons">edit</i>
                          </a>
                          <form action="{{route('convocatorias.destroy', $convocatoria->id)}}" method="post" style="display:inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de borrar esta convocatoria?')">Borrar</button>
                </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           {{$convocatorias->links()}}
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