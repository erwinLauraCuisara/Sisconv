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
                        $ruta="http://localhost:8000/$archivo";
                       ?>
                      <a type='button' href="{{$ruta}}" target='_blank' class='button'> ver archivo</a>
                      </td>
          
                      <td >
                      <div class="togglebutton">
                        <label>
                          <input type="checkbox" checked=""name="validado"id="validado"value="0">
                          <span class="toggle"></span>
                          Ok
                        </label>
                      </div>
        
                      </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <h2 class="title">Requisitos Generales</h2>

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
                        $ruta="http://localhost:8000/$archivo";
                       ?>
                      <a type='button' href="{{$ruta}}" target='_blank' class='button'> ver archivo</a>
                      </td>
          
                      <td class="td-actions ">
                      <form action="" method="get" style="display:inline">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                      <div class="togglebutton">
                        <label>
                          <input type="checkbox" checked=""name="validado"id="validado"value="0">
                          <span class="toggle"></span>
                          Ok
                        </label>
                      </div>
                </form>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

<style type="text/css">
  .button {
    width:100px;
    height:50px;
    -moz-box-shadow:inset 0 1px 0 0 #fff;
    -webkit-box-shadow:inset 0 1px 0 0 #fff;
    box-shadow:inset 0 1px 0 0 #fff;
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #d1d1d1) );
    background:-moz-linear-gradient( center top, #ffffff 5%, #d1d1d1 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#d1d1d1');
    background-color:#fff;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    border-radius:6px;
    border:1px solid #dcdcdc;
    display:inline-block;
    color:#777;
    font-family:Helvetica;
    font-size:15px;
    font-weight:700;
    padding:6px 24px;
    text-decoration:none;
    text-shadow:1px 1px 0 #fff
}
  .button:hover {
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #d1d1d1), color-stop(1, #ffffff) );
    background:-moz-linear-gradient( center top, #d1d1d1 5%, #ffffff 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d1d1d1', endColorstr='#ffffff');
    background-color:#d1d1d1
}
.button:active {
    position:relative;
    top:1px
}
</style>
          
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
