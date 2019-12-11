<?php

namespace App\Http\Controllers;

use App\convocatoria_usuario;
use Illuminate\Http\Request;
use App\convocatoria;

class ConvocatoriaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias=convocatoria::all();
        return view('index')->with(compact('convocatorias'));
    }

    public function getNota($idConvocatoria, $idUsuario){
        $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
        $notas=\DB::select('SELECT nota_requerimientos.*, users.name, users.email,users.id
        FROM nota_requerimientos,users,requerimientos,convocatorias
        WHERE convocatorias.id=requerimientos.convocatoria_id
        AND nota_requerimientos.Requerimiento_id=requerimientos.id 
        AND nota_requerimientos.user_id=users.id
        and nota_requerimientos.evaluado=1
        AND nota_requerimientos.Requerimiento_id=?'
         ,[$idConvocatoria,]);   
        
        return view('postulante.calificacionIndividual')->with(compact('idConvocatoria', 'secciones','subsecciones','items','idUsuario','notas'));
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
     * @param  \App\convocatoria_usuario  $convocatoria_usuario
     * @return \Illuminate\Http\Response
     */
    public function show(convocatoria_usuario $convocatoria_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\convocatoria_usuario  $convocatoria_usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(convocatoria_usuario $convocatoria_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\convocatoria_usuario  $convocatoria_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, convocatoria_usuario $convocatoria_usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\convocatoria_usuario  $convocatoria_usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(convocatoria_usuario $convocatoria_usuario)
    {
        //
    }
}
