@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h1 class="title">Calificacion de meritos</h1>
        <h2 class="title">Adjunte los requerimientos que tiene</h2>
        <h2 class="title">SECCION: {{$secciones[$contador]->titulo}}</h2>
        <h2 class="title">Nota Maxima de esta seccion:  {{$secciones[$contador]->NotaMaxima}}</h2>
       
        <div class="team">
          <div class="row">
            <label style="display:none">
                {{$contador=$contador+1}}  
              </label>
			
          <form action="" method="post" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">

        @foreach($subsecciones as $subseccion)
        <h3 class="title">Subseccion: {{$subseccion->titulo}}</h3>
          
            <table class="table">
            	{{ csrf_field() }}
             <thead>
                 <tr>
                    <th>Nombre Item</th>
                    <th>Nota por Item</th>
                     <th>Archivos subidos</th>
                    <th class="text-right">Haga click en el icono PDF para adjuntar archivo</th>
                 </tr>
             </thead>
                <tbody>
                @foreach($items as $item)
                @if($item->subseccion_id==$subseccion->id)
                    <label style="display:none">
                    {{$id=$item->id}}
                    {{$idT="$id"."texto"}}
                  </label>
                    <tr>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->notaPorItem}}</td>
                      <th><div id="{{$idT}}" ></div></th>
                     
                      <td class="td-actions text-right">
                          
                
                      <div class="col-md-12 centrear">
                <label for="{{$id}}" class="subirPdf">
                  <img src="{{URL::asset('/img/subirPdf.png')}}" height="50">
                  <i class="fas fa-cloud-upload-alt"></i> 
                  <p class="texto_imagen_sub">PDF</p>
                </label>
                <input id="{{$id}}" name="{{$id}}" onchange="cambiar('{{$id}}','{{$idT}}')" type="file" 
                style='display: none;' accept="application/pdf"/>
                
                </div>
                
                      </td>
                    </tr>
                    @endif
                    @endforeach

			

                   
                </tbody>
            </table>
            @endforeach
            <div class="col-md-5 ml-auto mr-auto text-center">
          <button type="submit" class="btn btn-primary ">Guardar y continuar</button>
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
          function cambiar(nombre, info){
          var pdrs = document.getElementById(nombre).files[0].name;
            document.getElementById(info).innerHTML = pdrs;

        }
        </script>
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