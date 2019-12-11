@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section ">
        <h1 class="title text-center"></h1>
        <h4 class="title text-center h2">RESULTADOS TABLA DE CALIFICACION DE MERITOS</h4>
        <div class="team">
          <div class="row">
          <table class="table table-bordered">
             @foreach($secciones as $seccione)
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">{{$id=$seccione->id}}</th>
                        <th>{{$seccione->titulo}}</th>
                        <th>Puntaje por Item</th>
                        <th>Archivo Subido</th>
                        <th>Puntaje de el Sistema</th>
                        <th>Puntaje de la Comision Evaluadora </th>
                        <th>Nota maxima de la seccion: {{$seccione->NotaMaxima}}</th>  
                    </tr> 
                    <br>
                </thead>
                    <?php      
                        $subsecciones=\DB::select('SELECT subseccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions,subseccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id and subseccions.seccion_id=seccions.id AND subseccions.seccion_id=? ORDER BY subseccions.id',[$id=$seccione->id]);             
                    ?>
                 @foreach($subsecciones as $subseccione)
                    <thead class="table-active">   
                        <tr>
                        <td class="text-center">{{$subseccione->id}}</td>
                        <td>{{$subseccione->titulo}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        
                    </thead>
                    <?php                                         
                        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND subseccion_id=? ORDER BY items.id',[$subseccione->id]);
                    ?>
                    @foreach($items as $item)
                        <tbody>
                    <?php
                    $idItem=$item->id;
                    $archivos=\DB::select('SELECT archivos.* FROM items, archivos,users,convocatorias ,requerimientos WHERE archivos.user_id=users.id AND archivos.convocatoria_id=convocatorias.id AND archivos.Requerimiento_id=requerimientos.id AND archivos.Item_id=items.id AND items.id=? AND users.id=? ORDER BY archivos.id',[$idItem,$idUsuario]);
                    $nota_items=\DB::select('SELECT nota_items.* FROM nota_items, users, requerimientos, archivos ,items WHERE nota_items.user_id=users.id AND nota_items.Requerimiento_id=requerimientos.id AND nota_items.Archivo_id=archivos.id AND nota_items.Item_id=items.id AND items.id=? AND users.id=? ORDER BY nota_items.Archivo_id', [$idItem,$idUsuario]);     
                    ?>
                            <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->notaPorItem}}</td>
                            <td>
                                @foreach($archivos as $archivo)
                                <br>
                                <?php      
                                $ar=$archivo->ruta;
                                $ruta="http://localhost:8080/$ar";
                                ?>
                                <a type='button' href="{{$ruta}}" target='_blank' class='btn btn-success'>Ver Archivo</a>
                                @endforeach
                            </td>
                            <td class="text-center" style="vertical-align:bottom;">@foreach($nota_items as $nota)
                                {{$nota->notaParcial}}
                                <br> <br>
                                @endforeach
                            </td>
                            <td>@foreach($nota_items as $notes)
                            {{$nota->notaComision}}
                            <br>
                                @endforeach
                            </td>    
                            </tr>
                        </tbody>
                    @endforeach
                 @endforeach
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