@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content') 
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/imagen4.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h2 class="title">SECCION: {{$secciones[$contador]->titulo}}</h2>
        <?php 
            $Requerimiento_id=\App\Requerimiento::where('convocatoria_id',$idConvocatoria)->get()[0]->id;
            
            $notaRequerimiento=\App\NotaRequerimiento::where('user_id',$idUser)->where('Requerimiento_id',$Requerimiento_id)->get()[0];
            $notaSeccion=\App\NotaSeccion::where('user_id',$idUser)->where('Requerimiento_id',$Requerimiento_id)->where('Seccion_id',$secciones[$contador]->id)->get()[0];
         ?>
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
                    
                    <th>Archivos por validar</th>
                    <th>item valido</th>
                    <th>observacion</th>


              

                    
                 </tr>
             </thead>
            
 
             
             @foreach($items as $item)
              <?php $idItem=$item->id ?>
                @if($item->subseccion_id==$subseccion->id)
                  @include('receptor.formulario',[$item, $contador,$idItem,$idUser])
                @endif
              @endforeach

           </table>
            @endforeach
            



            <form action="{{route('evaluador.siguiente',['idConvocatoria'=>$idConvocatoria,'idUser'=>$idUser, 'contador'=>$contador])}}" method="get" style="display:inline">
              {{ csrf_field() }}
            <button type="submit" class="btn btn-primary btn-lg btn-block">Siguiente</button>
            </form>

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