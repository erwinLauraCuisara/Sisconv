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
