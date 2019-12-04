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
    $idUser=\Auth::user()->id;
		$archivos=\App\Archivo::where('Item_id',$item->id)->where('user_id',$idUser)->get();
		
		?>
		<form action="" method="post" class="needs-validation" novalidate id="myForm" enctype="multipart/form-data">
      {{ csrf_field() }}
        <tbody>   
            <tr>
              <td>{{$item->nombre}}</td>
              <td>{{$item->notaPorItem}}</td>
              <td>sssssss</td>
              <td>rrrr</td>        
              <td><input type="text" name="d" class="form-control" id="d" required></td>
              <td><button type="submit" class="btn btn-primary ">Corregir</button></td>
  
          </td>
            </tr>       
        </tbody>
    </form>
            
        
     
           
          