<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostularController extends Controller
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
    public function create()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getRequisitosIndispensables($idConvocatoria , Request $request){
        $mensaje="codigo incorrecto porfabor vuelva a intentarlo";
        $codigo=request()->except("_token");
        $convocatoria=\App\convocatoria::find($idConvocatoria);
        $requisitosIndispensables=\DB::select("SELECT requisitos.* from convocatorias, requisitos where requisitos.convocatoria_id=? and requisitos.indispensable=1",[$idConvocatoria]);
        if($convocatoria->codigo==$codigo['codigo']){
            $mensaje="";
           
            return view('postulante.requisitosIndispensables')->with(compact('idConvocatoria', 'requisitosIndispensables'));
        }
        else{
            return view('postulante.codigo')->with(compact('idConvocatoria' ,'mensaje'));
        }
    }

    public function setRequisitosIndispensables($idConvocatoria , Request $request){

        // En realidad es agregar requisitos indispensables y no set

        $ids=request()->except("_token");
        $idUsuario=\Auth::user()->id;
        $sub_path="storage/convocatorias/$idConvocatoria/reqIndispensables";
        $destino_path=public_path($sub_path);
        if (!file_exists($destino_path)) {
                mkdir($destino_path, 0777, true);
                }
                foreach ($ids as $idRequisito =>$value) {
              
               $pdf=$request->file($idRequisito);
               $nombreArchivo="$idConvocatoria"."$idRequisito"."$idUsuario".".pdf";
               $pdf->move($destino_path,$nombreArchivo);

                $archivo=new \App\Archivo;
                $archivo->ruta="$sub_path"."/"."$nombreArchivo";
                $archivo->tipo="requisito indispensable";
                $archivo->Requisito_id=$idRequisito;
                $archivo->user_id=$idUsuario;
                $archivo->convocatoria_id=$idConvocatoria;
                $archivo->user_id=$idUsuario;
                $archivo->save();
        }


        $requisitosGenerales=\DB::select("SELECT requisitos.* from convocatorias, requisitos where requisitos.convocatoria_id=? and requisitos.indispensable=0",[$idConvocatoria]);
           return view('postulante.requisitosGenerales')->with(compact('idConvocatoria', 'requisitosGenerales'));
       }


    public function addRequisitosGenerales($idConvocatoria , Request $request){
        $ids=request()->except("_token");
        $idUsuario=\Auth::user()->id;
        $sub_path="storage/convocatorias/$idConvocatoria/reqGenerales";
        $destino_path=public_path($sub_path);
        if (!file_exists($destino_path)) {
                mkdir($destino_path, 0777, true);
                }
                foreach ($ids as $idRequisito =>$value) {
              
               $pdf=$request->file($idRequisito);
               $nombreArchivo="$idConvocatoria"."$idRequisito"."$idUsuario".".pdf";
               $pdf->move($destino_path,$nombreArchivo);

                $archivo=new \App\Archivo;
                $archivo->ruta="$sub_path"."/"."$nombreArchivo";
                $archivo->tipo="requisito general";
                $archivo->Requisito_id=$idRequisito;
                $archivo->user_id=$idUsuario;
                $archivo->convocatoria_id=$idConvocatoria;
                $archivo->user_id=$idUsuario;
                $archivo->save();
        }


     
       }

        
        
        

    
}
