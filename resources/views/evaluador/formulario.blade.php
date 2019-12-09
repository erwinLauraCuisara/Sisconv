
   		<?php  

		$archivos=\DB::select('SELECT archivos.* FROM items, archivos,users,convocatorias ,requerimientos WHERE archivos.user_id=users.id AND archivos.convocatoria_id=convocatorias.id AND archivos.Requerimiento_id=requerimientos.id AND archivos.Item_id=items.id AND items.id=? AND users.id=? ORDER BY archivos.id',[$idItem,$idUsuario]);
    $nota_items=\DB::select('SELECT nota_items.* FROM nota_items, users, requerimientos, archivos ,items WHERE nota_items.user_id=users.id AND nota_items.Requerimiento_id=requerimientos.id AND nota_items.Archivo_id=archivos.id AND nota_items.Item_id=items.id AND items.id=? AND users.id=? ORDER BY nota_items.Archivo_id', [$idItem,$idUsuario]);
		
		?>

                <tbody>   
                    <tr>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->notaPorItem}}</td>
                      <td>
                        @foreach($archivos as $archivo)
                        <br>
                        <?php      
                        $ar=$archivo->ruta;
                        $ruta="http://localhost:8000/$ar";
                       ?>
                      <a type='button' href="{{$ruta}}" target='_blank' class='button'>Ver Archivo</a>
                      @endforeach
                    </td>
                      <td>
                        @foreach($nota_items as $nota_item)
                        <br>
                        <br>

                        {{$nota_item->notaComision}}
                        @endforeach
                      </td>  
                               
                      
                      <td>
                          <form action="{{route('evaluador.save',['idItem'=>$idItem, 'idUsuario'=>$idUsuario])}}" method="get" style="display:inline">
                              {{ csrf_field() }}
                        @foreach($archivos as $archivo)

                        <br>
                        <input type="text" name="{{$archivo->id}}" class="form-control" id="{{$archivo->id}}">
                        @endforeach
                      <button type="submit" class="btn btn-primary ">Corregir Nota</button>
                    </form>
                  </td>
                    </tr>       
                </tbody>
            
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
            
        
     
           
          