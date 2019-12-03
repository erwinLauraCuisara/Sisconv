@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section ">
        <h1 class="title text-center">{{$convocatoria->titulo}}</h1>
        <h2 class="title text-center">{{$convocatoria->area}}</h2>
        <h4 class="title text-center">{{$convocatoria->descripcion}}</h4>
        <h4 class="title">Requisitos Indispensables</h4>
            <tbody>
                @foreach($requisitosIndispensables as $requisitosIndispensable)
                    <label style="display:none">
                    {{$id=$requisitosIndispensable->id}}
                    </label>
                    <td>{{$requisitosIndispensable->nombre}}</td>
                @endforeach  
            </tbody>
        <h4 class="title">Requisitos Generales</h4>
            <tbody>
                @foreach($requisitosGenerales as $requisitosGenerale)
                <label style="display:none">
                    {{$id=$requisitosGenerale->id}}
                </label>
                        <td>{{$requisitosGenerale->nombre}}</td>
                    @endforeach
            </tbody>
        <div class="team">
          <div class="row">
            <table class="table">
             <thead>
                 <tr>
                    <th class="text-center">Id</th>
                    <th>Titulo Seccion</th>
                    <th>Puntaje por Item</th>
                    <th>Puntaje de la Seccion</th>
                    
                 </tr>
             </thead>
                
            </table>
           
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