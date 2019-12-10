@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section ">
        <h1 class="title text-center">{{$convocatoria->titulo}}</h1>
        <h2 class="title text-center">{{$convocatoria->area}}</h2>
        <h4 class="title text-center">{{$convocatoria->descripcion}}</h4>
        <h4 class="title text-center h2">RESULTADOS TABLA DE CALIFICACION DE MERITOS</h4>
        <div class="team">
          <div class="row">
            <table class="table table-bordered">
            <thead class="thead-dark">
                   <th>Nombre Postulante</th>
                   <th>Correo</th> 
                   <th>Nota Sistema</th>
                   <th>Nota Comision</th>
            </thead>
            @foreach($notas as $nota)
            <tbody >
                   <td>{{$nota->name}}</td>
                   <td>{{$nota->email}}</td> 
                   <td>{{$nota->notaParcial}}</td>
                   <td>{{$nota->notaComision}}</td>
                   <td><a href="{{route('convocatorias.getNota', ['idConvocatoria'=>$idConvocatoria, 'idUser'=>$nota->id])}}" class="btn btn-success">DETALLES</a><td>
            </tbody>
            @endforeach
             <br> 
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