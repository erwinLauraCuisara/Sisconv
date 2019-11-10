<?php

namespace App\Http\Controllers;

use App\convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function index()
    {
        $convocatorias=convocatoria::paginate(2);
        return view('convocatorias.index')->with(compact('convocatorias'));

    }

    public function create()
    {
        return view('convocatorias.form');
    }

    public function store(Request $request)
    {          
        $datosConvocatoria=request()->except("_token");
        if(!isset($datosConvocatoria['visible'])){
                $datosConvocatoria['visible']=false;
        }
        $data=new convocatoria;
        $data->titulo = $datosConvocatoria['Titulo'];
        $data->area = $datosConvocatoria['area'];
        $data->descripcion = $datosConvocatoria['descripcion'];
        $data->fechaIni = $datosConvocatoria['fechaIni'];
        $data->fechaFin = $datosConvocatoria['fechaFin'];
        $data->visible = $datosConvocatoria['visible'];
        $data->save();
        $id=$data->id;
        

        $imagen=$request->file("imagen");
        $sub_path="storage/convocatorias/$id";
        $destino_path=public_path($sub_path);
        if(mkdir($destino_path, 0777, true)){
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
        }

        
        return redirect('convocatorias'); 

    }
    public function show(convocatoria $convocatoria)
    {
        //
    }

    public function edit(convocatoria $convocatoria)
    {
        //
    }

    public function update(Request $request, convocatoria $convocatoria)
    {
        //
    }


    public function destroy(convocatoria $convocatoria)
    {
        //
    }

    public function evaluador(){
        $convocatorias=convocatoria::all();
        return view('convocatorias.evaluador')->with(compact('convocatorias'));

    }
    
}
