@extends('layout.principal')

@section('content')

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
            <td>{{$convocatoria->id}}</td>
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