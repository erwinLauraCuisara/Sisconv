<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $items=\DB::select("SELECT items.* ,  seccions.titulo AS titulo_seccion,subseccions.titulo AS titulo_subseccion, requerimientos.id AS id_requerimiento from subseccions, seccions, requerimientos ,items where items.subseccion_id=subseccions.id and subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and requerimientos.id=?",[$id]);
            $subsecciones=\DB::select("SELECT subseccions.titulo, subseccions.id from requerimientos, subseccions, seccions WHERE requerimientos.id=seccions.requerimiento_id and requerimientos.id=? group by subseccions.id",[$id]);
            
        
        return view('convocatorias.formItems')->with(compact('items','id','subsecciones'));
        //return $subs  ecciones;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
   public function agregar($id, Request $request)
    {
      $datosItems=request()->except("_token");
        $data=new \App\Item;
        $data->nombre = $datosItems['nombre'];
        $data->notaPorItem =  $datosItems['NotaPorItem'];
        $data->descripcion = $datosItems['descripcion'];
        $data->subseccion_id=$datosItems['subSeccion'];
        $data->save();
        $items=\DB::select("SELECT items.* ,  seccions.titulo AS titulo_seccion,subseccions.titulo AS titulo_subseccion, requerimientos.id AS id_requerimiento from subseccions, seccions, requerimientos ,items where items.subseccion_id=subseccions.id and subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and requerimientos.id=?",[$id]);
            $subsecciones=\DB::select("SELECT subseccions.titulo, subseccions.id from requerimientos, subseccions, seccions WHERE requerimientos.id=seccions.requerimiento_id and requerimientos.id=? group by subseccions.id",[$id]);
            
        
        return view('convocatorias.formItems')->with(compact('items','id','subsecciones'));        }
}
