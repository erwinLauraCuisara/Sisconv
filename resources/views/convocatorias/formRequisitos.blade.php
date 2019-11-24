
@extends('layout.principal')
@section('content')

<div  style="padding:3%">
<h1>Requerimientos</h1>
<div class="form-group col-md-2">
          <label for="fechaFin">{{'Fecha de entrega'}}</label>
          <input type="date" name="fechaFin" class="form-control" id="fechaFin" placeholder="09/10/2019" required>
          <div class="invalid-feedback">
            Fecha invalida
          </div>
        </div>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
    
        <tr>

            <th>Impresindible</th>
            <th>Titulo</th>
            
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody style="font-weight: bold" id="tabla">
    
      

    </tbody>
</table>
<h2>¿Desea agregar nuevos requerimientos?</h2>
<div class="form-group col-md-6">
          <label for="Titulo">{{'Titulo del requerimiento'}}</label>
          <input type="text" name="Titulo" class="form-control" id="Titulo" required>
          <div class="invalid-feedback">
            Debe llenar el campo
          </div>
        </div>
        
        <div class="form-group">
        <label for="Descripcion">{{'Descripcion'}}</label>
        <textarea class="form-control" name="descripcion" id="Descripcion" rows="3" required></textarea>
        <div class="invalid-feedback">
            Debe llenar el campo
        </div>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="visible" id="Imprecindible" value="1">
          Imprecindible
        </label>

      </div>
<a onclick="guardar()" class="btn btn-success" >Agregar nuevo requerimiento</a>


<script type="text/javascript">
  function guardar(){
   
    var _titulo = document.getElementById("Titulo").value;
    var _descripcion = document.getElementById("Descripcion").value;
    var _imprecindible = document.getElementById("Imprecindible").value;
    var mensaje="'esta seguro de borrar este requerimiento'";
    var boton='<td><form action="" method="post" style="display:inline">{{csrf_field()}}{{ method_field("DELETE")}}<button class="btn btn-danger" type="styleubmit" onclick="return confirm('+mensaje+')">Borrar</button></form></td>';

    
    var fila="<tr><td>"+_imprecindible+"</td><td>"+_titulo+"</td><td>"+_descripcion+"</td>"+boton+"</tr>";

    var btn = document.createElement("TR");
    btn.innerHTML=fila;
    document.getElementById("tabla").appendChild(btn);
}
</script>
</div>
@stop