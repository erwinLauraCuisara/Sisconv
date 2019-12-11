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
                   @role('evaluador')
                    <th>Nota Sistema</th>
                   @endrole
                   <th>Nota Tabla de Meritos</th>
                   <th>Porcentaje de la tabla de Meritos en la Convocatoria</th>
                   
            </thead>
            @foreach($notas as $nota)
            <tbody >
                   <td>{{$nota->name}}</td>
                   <td>{{$nota->email}}</td>
                   @role('evaluador') 
                   <td>{{$nota->notaParcial}}</td>
                   @endrole
                   <td>{{$nota->notaComision}}</td>
                   <td>   
                   <?php
                    $notaReq=\DB::select('SELECT requerimientos.MaximaNota as nota
                    FROM requerimientos,convocatorias
                    WHERE convocatorias.id=requerimientos.convocatoria_id
                    AND requerimientos.convocatoria_id=?', [$idConvocatoria]);
                    $puntaje=$notaReq[0]->nota;
                    $notas=\DB::select('SELECT nota_requerimientos.*, users.name, users.email,users.id
                    FROM nota_requerimientos,users,requerimientos,convocatorias
                    WHERE convocatorias.id=requerimientos.convocatoria_id
                    AND nota_requerimientos.Requerimiento_id=requerimientos.id 
                    AND nota_requerimientos.user_id=users.id
                    and nota_requerimientos.evaluado=1
                    AND nota_requerimientos.Requerimiento_id=?'
                    ,[$idConvocatoria,]);
                    $puntajeComi=$notas[0]->notaComision; 
                    echo $puntaje*($puntajeComi/100);
                   ?>
                  
                  </td>
                   <td><a href="{{route('convocatorias.getNota', ['idConvocatoria'=>$idConvocatoria, 'idUser'=>$nota->id])}}" class="btn btn-success">DETALLES</a></td>
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