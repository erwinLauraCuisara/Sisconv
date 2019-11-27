<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubSeccionController extends Controller
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
     * @param  \App\SeccionGrupoitems  $seccionGrupoitems
     * @return \Illuminate\Http\Response
     */
    public function show($subseccion)
    {
    	$subsecciones=\DB::select("SELECT subseccions.* ,  seccions.titulo AS titulo_seccion, requerimientos.id AS id_requerimiento from subseccions, seccions, requerimientos where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and requerimientos.id=?",[$subseccion]);

        
        return view('convocatorias.formSubsecciones')->with(compact('subsecciones'));
    	//return $subsecciones;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeccionGrupoitems  $seccionGrupoitems
     * @return \Illuminate\Http\Response
     */
    public function edit(SeccionGrupoitems $seccionGrupoitems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeccionGrupoitems  $seccionGrupoitems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeccionGrupoitems $seccionGrupoitems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeccionGrupoitems  $seccionGrupoitems
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeccionGrupoitems $seccionGrupoitems)
    {
        //
    }
}
