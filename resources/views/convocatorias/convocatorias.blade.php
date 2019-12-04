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
        <h4 class="title h3">REQUISITOS INDISPENSABLES</h4>
            <tbody>
                @foreach($requisitosIndispensables as $requisitosIndispensable)
                    <label style="display:none">
                    {{$id=$requisitosIndispensable->id}}
                    </label>
                    <td class="h4">{{$requisitosIndispensable->nombre}}</td>
                    <br>
                @endforeach  
            </tbody>
        <h4 class="title h3">REQUISITOS GENERALES</h4>
            <tbody>
                @foreach($requisitosGenerales as $requisitosGenerale)
                <label style="display:none">
                    {{$id=$requisitosGenerale->id}}
                </label>
                        <td class="h1">{{$requisitosGenerale->nombre}}</td>
                        <br>
                    @endforeach
            </tbody>

        <h4 class="title text-center h2">TABLA DE CALIFICACION DE MERITOS</h4>
        <div class="team">
          <div class="row">
            <table class="table table-bordered">
             @foreach($secciones as $seccione)
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">{{$id=$seccione->id}}</th>
                        <th>{{$seccione->titulo}}</th>
                        <th>Puntaje por Item</th>
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
                        </tr>
                        
                    </thead>
                    <?php      
                                   
                        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND subseccion_id=? ORDER BY items.id',[$subseccione->id]);
                    ?>
                    @foreach($items as $item)
                        <tbody>
                            <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->notaPorItem}}</td>
                            <td></td>    
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