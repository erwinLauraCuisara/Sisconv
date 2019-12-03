<?php

namespace App\Http\Controllers;

use App\Requisito;
use Illuminate\Http\Request;
use App\Requisito_usuario;

class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($prueba)
    {
         //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function show($requisito)
    {
        // = array('id' =>"$requisito");
            
         return view('convocatorias.formRequisitos')->with(compact('requisito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisito $requisito)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisito $requisito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisito=Requisito::find($id);
        $id=$requisito->convocatoria_id;
        $requisito->delete();
     
        return redirect(route('requisitos.show', $id));
    }

    public function agregar($requisito, Request $request)
    {
        //return "holaa este es el id:". $requisito.$request;
        $datosRequisito=request()->except("_token");

        if(!isset($datosRequisito['Indispensable'])){
                $datosRequisito['Indispensable']=false;
        }

        $data=new Requisito;
        $data->nombre = $datosRequisito['Titulo'];
        $data->convocatoria_id = $requisito;
        $data->indispensable = $datosRequisito['Indispensable'];
        $data->descripcion = $datosRequisito['descripcion'];
        $data->save();

        $data=new req_usuario;
        $data->nombre = $datosRequisito['Titulo'];
        $data->convocatoria_id = $requisito;
        $data->indispensable = $datosRequisito['Indispensable'];
        $data->descripcion = $datosRequisito['descripcion'];
        $data->save();

        $convocatoria=\App\convocatoria::find($requisito);
        $convocatoria->fechaLimRequisitos=$datosRequisito['fechaFin'];
        $convocatoria->save();


        //return view('convocatorias.formRequisitos')->with(compact('requisito'));
        return redirect(route('requisitos.show', $requisito));
    }

    public function receptorShow($idConvocatoria)
    {
        $postulantes=\DB::select('SELECT users.id , users.name, users.apellidos, users.email  from users , req_usuario , convocatorias WHERE users.id=req_usuario.user_id AND req_usuario.convocatoria_id=convocatorias.id AND convocatorias.id=? GROUP BY users.id',[$idConvocatoria]);
            
         return view('convocatorias.receptor.receptor')->with(compact('idConvocatoria', 'postulantes'));
    }
}
