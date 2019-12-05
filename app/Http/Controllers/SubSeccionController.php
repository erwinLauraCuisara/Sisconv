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
        //return "holaa este es el id:". $requisito.$request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeccionGrupoitems  $seccionGrupoitems
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$subsecciones=\DB::select("SELECT subseccions.* ,  seccions.titulo AS titulo_seccion, requerimientos.id AS id_requerimiento from subseccions, seccions, requerimientos where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and requerimientos.id=?",[$id]);

        
        return view('convocatorias.formSubsecciones')->with(compact('subsecciones','id'));
    	
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

    public function agregar($subseccion, Request $request)
    {
      $datosSubseccion=request()->except("_token");
        $data=new \App\Subseccion;
        $data->titulo = $datosSubseccion['Titulo'];
        $data->seccion_id =  $datosSubseccion['Seccion'];
        //$data->descripcion = $datosSubseccion['descripcion'];
        $data->save();
        $subsecciones=\DB::select("SELECT subseccions.* ,  seccions.titulo AS titulo_seccion, requerimientos.id AS id_requerimiento from subseccions, seccions, requerimientos where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and requerimientos.id=?",[$subseccion]);
        $id=$subsecciones[0]->id_requerimiento;
        
        return view('convocatorias.formSubsecciones')->with(compact('subsecciones','id'));
        }
}
