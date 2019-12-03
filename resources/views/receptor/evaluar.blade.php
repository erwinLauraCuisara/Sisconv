@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h2 class="title">Requisitos Indispensables</h2>
        <div class="team">
          <div class="row">
            <table class="table">
             <thead>
                 <tr>
                    <th>Requisito</th>
                    <th>Archivo por evaluar</th>
                    <th class="text-right"></th>
                 </tr>
             </thead>
                <tbody>
                @foreach($requisitos as $requisito)
                  @if($requisito->indispensable==1)
                    <tr>
                     <td> {{$requisito->nombre}}</td>
                      <td>
                      <?php      
                        $archivo=\App\Archivo::where('Requisito_id',$requisito->id)->where('user_id',$requisito->user_id)->where('convocatoria_id',$idConvocatoria)->get()[0]->ruta;
                        echo $archivo;
                      ?>
                      </td>
          
                      <td >
                          <div class="togglebutton">
  <label>
      <input type="checkbox" checked="">
    Toggle is on
  </label>
</div>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <h2 class="title">Requerimientos Generales</h2>

             <table class="table">
             <thead>
                 <tr>
                    <th>Requisito</th>
                    <th>Archivo por evaluar</th>
                    <th class="text-right"></th>
                 </tr>
             </thead>
                <tbody>
                @foreach($requisitos as $requisito)
                  @if($requisito->indispensable==0)
                    <tr>
                     <td> {{$requisito->nombre}}</td>
                      <td>
                      <?php      
                        $archivo=\App\Archivo::where('Requisito_id',$requisito->id)->where('user_id',$requisito->user_id)->where('convocatoria_id',$idConvocatoria)->get()[0]->ruta;
                        echo $archivo;
                      ?>
                      </td>
          
                      <td class="td-actions text-right">
                          <form action="" method="get" style="display:inline">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" >OK</button>
                </form>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
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
