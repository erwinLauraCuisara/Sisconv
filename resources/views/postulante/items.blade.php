@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h1 class="title">Calificacion de meritos de {{$secciones[0]->convocatoriaTitulo}}</h1>
        <h2 class="title">SECCION: {{$secciones[$contador]->titulo}}</h2>
        <h2 class="title">Nota Maxima de esta seccion:  {{$secciones[$contador]->NotaMaxima}}</h2>
       
        <div class="team">
          <div class="row">
            <label style="display:none">
                
              </label>
			      

        @foreach($subsecciones as $subseccion)
        <h3 class="title">Subseccion: {{$subseccion->titulo}}</h3>
        <h4 class="title">{{$subseccion->descripcion}}</h4>         
            <table class="table">
            	{{ csrf_field() }}
             <thead>
                 <tr>
                    <th>Nombre Item</th>
                    <th>Nota por Item</th>
                    <th>Archivos subidos</th>
                    <th>Archivos cargados</th>
                    <th class="text-right">Haga click en el icono PDF para adjuntar archivo</th>
                 </tr>
             </thead>
            
 
             
             @foreach($items as $item)
          
                @if($item->subseccion_id==$subseccion->id)
                  @include('postulante.formulario',[$item, $contador])
                @endif
              @endforeach

           </table>
            @endforeach
            



            <form action="{{route('postular.addRequisitosGenerales',['idConvocatoria'=>$idConvocatoria, 'contador'=>$contador])}}" method="post" style="display:inline">
              {{ csrf_field() }}
              <input type="hidden" name="xd" value="xd">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Siguiente</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
          function cambiar(nombre, info){
              var pdrs="";
          for (paso = 0; paso < 100; paso++) {
            try {
              pdrs=pdrs+"*"+document.getElementById(nombre).files[paso].name+"<br>";
            }
            catch(error) {
              break;
            }
        
            
          };
          

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