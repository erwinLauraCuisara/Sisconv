<?php

namespace App\Http\Controllers;

use App\convocatoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ConvocatoriaController extends Controller
{
    public function index()
    {
        $convocatorias=convocatoria::paginate(10);
        return view('convocatorias.index')->with(compact('convocatorias'));

    }

    public function create()
    {
        return view('convocatorias.form');
    }

    public function store(Request $request)
    {          
        $datosConvocatoria=request()->except("_token");
    
        $data=new convocatoria;
        $data->titulo = $datosConvocatoria['Titulo'];
        $data->area = $datosConvocatoria['area'];
        $data->descripcion = $datosConvocatoria['descripcion'];
        $data->fechaIni = $datosConvocatoria['fechaIni'];
        $data->fechaFin = $datosConvocatoria['fechaFin'];
        $data->fechaIniBole = $datosConvocatoria['fechaIniBole'];
        $data->fechaFinBole = $datosConvocatoria['fechaFinBole'];
        $data->fechaLimRequisitos=$datosConvocatoria['fechaFinBole'];
        $data->codigo=substr(uniqid(rand(), true),5, 5);
        $data->save();
        $id=$data->id;
        

        $imagen=$request->file("imagen");
        $sub_path="storage/convocatorias/$id";
        $destino_path=public_path($sub_path);
        if (!file_exists($destino_path)) {
                mkdir($destino_path, 0777, true);
                }
        if(isset($imagen)){
            //$real_name=$imagen->getClientOriginalName();
            
            $tamanio = $imagen->getSize();
            $extension = $imagen->getClientOriginalExtension();
            $imagen->move($destino_path,"imagen".".$extension");
        }
        
        $pdf=$request->file("pdf");
        if(isset($pdf)){
            //$real_name=$pdf->getClientOriginalName();
            $tamanio = $pdf->getSize();
            $pdf->move($destino_path,"documento.pdf");
        }
        


        
        return redirect(route('requisitos.show', $id)); 

    }
    public function show($idConvocatoria,Request $request)
    {
        $convocatoria=\App\convocatoria::find($idConvocatoria);  
        $requisitosIndispensables=\DB::select("SELECT requisitos.* from convocatorias, requisitos where requisitos.convocatoria_id=? and requisitos.indispensable=1 AND convocatorias.id=requisitos.convocatoria_id",[$idConvocatoria]);
        $requisitosGenerales=\DB::select("SELECT requisitos.* from convocatorias, requisitos where requisitos.convocatoria_id=? and requisitos.indispensable=0 and convocatorias.id=requisitos.convocatoria_id",[$idConvocatoria]);
        $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
        
        return view('convocatorias.convocatorias')->with(compact('convocatoria','requisitosIndispensables','requisitosGenerales','secciones'));
    }

    public function edit(convocatoria $convocatoria)
    {
        //
    }

    public function update(Request $request, convocatoria $convocatoria)
    {
        //
    }


    public function destroy($id)
    {
        $convocatoria=convocatoria::find($id);
        $convocatoria->delete();
        $sub_path="storage/convocatorias/$id";
        $destino_path=public_path($sub_path);
        foreach(glob($destino_path . "/*") as $archivos_carpeta){             
        if (is_dir($archivos_carpeta)){
          rmDir_rf($archivos_carpeta);
        } else {
        unlink($archivos_carpeta);
        }
      }
      rmdir($destino_path);
     
        return redirect('convocatorias');
    }

    public function receptor(){
        $convocatorias=convocatoria::all();
        return view('convocatorias.receptor')->with(compact('convocatorias'));

    }
    
    public function calificacionesPostulante($idConvocatoria){
        $convocatoria=\App\convocatoria::find($idConvocatoria); 
        $notas=\DB::select('SELECT nota_requerimientos.*, users.name, users.email,users.id
        FROM nota_requerimientos,users,requerimientos,convocatorias
        WHERE convocatorias.id=requerimientos.convocatoria_id
        AND nota_requerimientos.Requerimiento_id=requerimientos.id 
        AND nota_requerimientos.user_id=users.id
        and nota_requerimientos.evaluado=1
        AND nota_requerimientos.Requerimiento_id=?'
         ,[$idConvocatoria,]);        
        return view('postulante.calificaciones')->with(compact('notas','convocatoria','idConvocatoria'));
    }
}
