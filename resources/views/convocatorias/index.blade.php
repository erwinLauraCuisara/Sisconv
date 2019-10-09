@extends('layout.principal')

@section('content')

<div>
<br>
<a href="{{url('convocatorias/create')}}" class="btn btn-success" >Agregar Convocatoria</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>P</th>
            <th>id</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Fecha Publicación</th>
            <th>Fecha Finalización</th>
        </tr>
    </thead>
    <tbody>
    
        <tr>
            <td>SI</td>
            <td>1</td>
            <td>Nombre</td>
            <td>Departamento</td>
            <td>2019-12-10</td>
            <td>2019-12-22</td>
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
    
    </tbody>
</table>
</div>
@stop