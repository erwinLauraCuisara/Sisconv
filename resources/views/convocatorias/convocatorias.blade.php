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
                    <br>
                @endforeach  
            </tbody>
        <h4 class="title">Requisitos Generales</h4>
            <tbody>
                @foreach($requisitosGenerales as $requisitosGenerale)
                <label style="display:none">
                    {{$id=$requisitosGenerale->id}}
                </label>
                        <td>{{$requisitosGenerale->nombre}}</td>
                        <br>
                    @endforeach
            </tbody>
        <h4 class="title">Secciones </h4>
        <tbody>
            @foreach($secciones as $seccione)
                <label style="display:none">
                    {{$id=$seccione->id}}
                </label>
                        <td>{{$seccione->titulo}}</td>
                        <br>
                    @endforeach
            </tbody>
        <h4 class="title">Subsecciones </h4>
        <h4 class="title">Items</h4>
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
             </thead>
             <tbody> 
                @foreach($subsecciones as $subseccione)
                    <tr>
                      <td class="text-center">{{$id=$seccione->id}}</td>
                      <td>{{$subseccione->titulo}}</td>
                      <td>nota</td>
                      <td>nota</td>
                    </tr>
                @endforeach
                
             </tbody>
             @endforeach   
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