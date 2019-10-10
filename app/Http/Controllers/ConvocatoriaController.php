<?php

namespace App\Http\Controllers;

use App\convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('convocatorias.form');
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
        $this->validate($request,[
            'fTitulo' => 'required',
            'fFecIni' => 'required',
            'fFecFin' => 'required',
            'fArea' => 'required',
            'fGest' => 'required',
            'fDescrip' => 'required',
            'fView' => 'required',
        ]);
        $emps = new Employe;
        $emps = new convocatoria;

        $emps->fname = $request->input('titulo');
        $emps->fname = $request->input('area');
        $emps->fname = $request->input('descripcion');
        $emps->fname = $request->input('fechaIni');
        $emps->fname = $request->input('fechaFin');
        //$emps->fname = $request->input('fDescrip');
        $emps->fname = $request->input('visible');
        
        $emps->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function show(convocatoria $convocatoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit(convocatoria $convocatoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, convocatoria $convocatoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(convocatoria $convocatoria)
    {
        //
    }
}
