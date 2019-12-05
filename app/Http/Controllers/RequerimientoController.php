<?php

namespace App\Http\Controllers;

use App\Requerimiento;
use Illuminate\Http\Request;

class RequerimientoController extends Controller
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
     * @param  \App\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function show($requerimiento)
    {
       return view('convocatorias.formRequerimientos')->with(compact('requerimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requerimiento $requerimiento)
    {
        //
    }


        public function agregar($requerimiento, Request $request)
    {
        
        $datosRequerimiento=request()->except("_token");
        $data=new Requerimiento;
        $data->Titulo = $datosRequerimiento['Titulo'];
        $data->convocatoria_id = $requerimiento;
        $data->MaximaNota = $datosRequerimiento['MaximaNota'];
        $data->descripcion = $datosRequerimiento['descripcion'];
        $data->fechaInicial = $datosRequerimiento['fechaIni'];
        $data->fechaFinal = $datosRequerimiento['fechaFin'];
        $data->save();


        //return view('convocatorias.formRequisitos')->with(compact('requisito'));
        return redirect(route('secciones.show', $data->id));
    }

    public function requerimientosShow($idConvocatoria){
        //muestra los postulantes por evaluar

        $postulantes=\DB::select('SELECT users.id , users.name, users.apellidos, users.email  from users ,nota_requerimientos, requerimientos , convocatorias WHERE users.id=nota_requerimientos.user_id AND requerimientos.id=nota_requerimientos.Requerimiento_id AND convocatorias.id=requerimientos.convocatoria_id AND convocatorias.id=? GROUP BY users.id',[$idConvocatoria]);
            
         return view('evaluador.showEvaluador')->with(compact('idConvocatoria', 'postulantes'));

    }
    public function showItems($idConvocatoria, $idUsuario){
        //muestra el formulario para realizar las evaluacioenes
        $contador=0;    
        $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
        $subsecciones=\DB::select('SELECT subseccions.*  from subseccions, seccions, requerimientos ,convocatorias where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and convocatorias.id=requerimientos.convocatoria_id and subseccions.seccion_id=? AND convocatorias.id=?',[$secciones[$contador]->id,$idConvocatoria]);
        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
        


        return view('evaluador.evaluar')->with(compact('idConvocatoria', 'secciones','subsecciones','items','contador','idUsuario'));


        

    }
}
