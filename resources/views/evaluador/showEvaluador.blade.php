@extends('layout.principal')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('../img/profile_city.jpg')">
  </div>
  <div class="main main-raised">
    <div class="container">  
    <div class="section text-center">
        <h2 class="title">Postulantes</h2>
        <div class="team">
          <div class="row">
            <table class="table">
             <thead>
                 <tr>
                    <th>Evaluada</th>
                    <th>usuario</th>
                    <th>correo</th>
                    <th class="text-right"></th>
                 </tr>
             </thead>
                <tbody>
                @foreach($postulantes as $postulante)
                    <tr>
                      <td>
                      <?php
                        $idReq=\App\Requerimiento::where('convocatoria_id',$idConvocatoria)->get()[0]->id;
                        $evaluado=\App\NotaRequerimiento::where('user_id',$postulante->id)->where('Requerimiento_id', $idReq)->get()[0]->evaluado;  
                        if($evaluado){
                          echo "Si";
                        }
                        else{
                            echo "No";
                          }
                      ?>
                      </td>
                      <td> <?php echo $postulante->name." ".$postulante->apellidos;?></td>
                      <td>{{$postulante->email}}</td>
                      <td class="td-actions text-right">
                          <form action="{{route('evaluador.evaluar', ['idConvocatoria'=>$idConvocatoria, 'idUser'=>$postulante->id])}}" method="get" style="display:inline">
                        {{csrf_field()}}

                <button class="btn btn-danger" type="submit" >Evaluar</button>
                </form>
                      </td>
                    </tr>
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