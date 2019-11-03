@extends('layout.principal')

@section('content')
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>

<div  style="padding:3%">
<a href="{{url('convocatorias/create')}}" class="btn btn-success" >Agregar Convocatoria</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>P</th>
            <th>Id</th>
            <th>Titulo</th>
            <th>Area</th>
            <th>Fecha Publicación</th>
            <th>Fecha Finalización</th>
        </tr>
    </thead>
    <tbody >
    @foreach($convocatorias as $convocatoria)
        <tr>
            <td>
            <?php      
            if(($convocatoria->visible)==true)
                echo "Si";
            else
                echo "No";
            ?>
            </td>
            <td>{{$loop->iteration}}</td>
            <td>{{$convocatoria->titulo}}</td>
            <td>{{$convocatoria->area}}</td>
            <td>{{$convocatoria->fechaIni}}</td>
            <td>{{$convocatoria->fechaFin}}</td>
            <td>
                <a class="btn btn-primary" href="">Editar</a>
                <a class="btn btn-secondary" href="">Ver</a>
                <form action="" method="post" style="display:inline">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Eliminar la convocatoria?')">Borrar</button>
                </form>
              </td>
              
        </tr>
    @endforeach
    </tbody>
</table>
{{$convocatorias->links()}}
</div>
@stop