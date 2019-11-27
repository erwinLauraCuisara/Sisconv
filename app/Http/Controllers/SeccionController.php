<?php

namespace App\Http\Controllers;

use App\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
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
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show($seccion)
    {
        return view('convocatorias.formSecciones')->with(compact('seccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccion $seccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seccion=Seccion::find($id);
        $id=$seccion->requerimiento_id;
        $seccion->delete();
     
        return redirect(route('secciones.show', $id));
    }
    public function agregar($requerimiento, Request $request)
    {
        //return "holaa este es el id:". $requerimiento.$request;
        $datosRequisito=request()->except("_token");

        $data=new Seccion;
        $data->titulo = $datosRequisito['Titulo'];
        $data->requerimiento_id = $requerimiento;
        $data->NotaMaxima = $datosRequisito['NotaMaxima'];
        $data->save();


        //return view('convocatorias.formRequisitos')->with(compact('requisito'));
        return redirect(route('secciones.show', $requerimiento));
    }
}
