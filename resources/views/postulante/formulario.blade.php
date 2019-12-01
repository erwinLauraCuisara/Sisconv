@if(count($errors)>0)
  <div>
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
      @endforeach                
      </ul>
  </div>
@endif
   		<?php  
		$archivos=\App\Archivo::where('Item_id',$item->id)->get();
		$texto="";
		
		foreach($archivos as $archivo){
			$nombre=$archivo->nombreOriginal;
			$texto="$texto"."*"."$nombre"."<br>";
		}
		$id=$item->id;
		$idT=$id."texto";
		?>
		<form action="{{action('PostularController@addItems',['idItem'=>$id, 'contador'=>$contador])}}" method="post" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">
            	{{ csrf_field() }}
                <tbody>   
                    <tr>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->notaPorItem}}</td>
                      <td><?php echo $texto;?></td>
                      <td><div id={{$idT}}></td>           
                      <td class="td-actions text-right">
                      <div class="col-md-8 centrear">
                <label for="{{$id}}" class="subirPdf">
            <img src="{{URL::asset('/img/subirPdf.png')}}" height="50">
            <i class="fas fa-cloud-upload-alt"></i> 
            <p class="texto_imagen_sub">PDF</p>
          </label>

          </div>
     		<input id="{{$id}}"  name="{{$id}}[]" onchange="cambiar('{{$id}}','{{$idT}}')" type="file" multiple accept="application/pdf"/>
     		 <br>
          <button type="submit" class="btn btn-primary ">Guardar Archivo</button>
        	</td>
                    </tr>       
                </tbody>
             </form>
            
        
     
           
          