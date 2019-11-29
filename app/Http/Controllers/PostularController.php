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
        $codigoConvocatoria=\App\convocatoria::find($idConvocatoria);
        if($codigoConvocatoria->codigo==$codigo['codigo']){
            $mensaje="";
            return view('postulante.requisitosIndispensables')->with(compact('idConvocatoria'));
        }
        else{
            return view('postulante.codigo')->with(compact('idConvocatoria' ,'mensaje'));
        }
    }
}
