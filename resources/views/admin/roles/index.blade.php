@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h2 class="title">ROL</h2>
        <div class="team">
          <div class="row">
          <a href="{{url('/roles/create')}}" class="btn btn-success" >Agregar rol</a>
            <table class="table">
             <thead>
                 <tr>
                    <th class="text-center">Id</th>
                    <th>Nombre</th>
                 </tr>
             </thead>
                <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td>{{$role->name}}</td>
                      <td class="td-actions text-right">
                          <a href="" rel="tooltip" title="Ver Convocatorias" class="btn btn-info btn-fab btn-round">
                              <i class="material-icons">info</i>
                          </a>
                          <a href="" rel="tooltip" title="Editar Convocatorias" class="btn btn-success btn-fab btn-round">
                              <i class="material-icons">edit</i>
                          </a>
                          <a href="" rel="tooltip" title="Eliminar Convocatorias" class="btn btn-danger btn-fab btn-round">
                              <i class="material-icons">clear</i>
                          </a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$roles->links()}}
           
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