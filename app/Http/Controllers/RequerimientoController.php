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
        //$data->descripcion = $datosRequerimiento['descripcion'];
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
    public function save(Request $request, $idItem ,$idUsuario){

        $notasModificadas=request()->except("_token");
        $Ids=\DB::select("SELECT requerimientos.id AS idRequerimiento,seccions.id AS idSeccion 
         FROM items,subseccions,seccions,requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id 
         AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND items.id=?",[$idItem])[0];
        foreach($notasModificadas as $key => $value){
                if(isset($value)){
            \App\NotaItem::where('user_id',$idUsuario)->where('Item_id',$idItem)->where('Archivo_id',$key)->update(['notaComision' => $value]);  
                }
         }
         
         $notaSumItems=\DB::select('SELECT sum(nota_items.notaComision) as sumaItem from nota_items, items, requerimientos,seccions, subseccions WHERE nota_items.user_id=? AND nota_items.Item_id=items.id AND nota_items.Requerimiento_id=requerimientos.id AND requerimientos.id=? AND seccions.id=subseccions.seccion_id AND subseccions.id=items.subseccion_id AND seccions.id=?',[$idUsuario,$Ids->idRequerimiento, $Ids->idSeccion])[0];

         \App\NotaSeccion::where('user_id',$idUsuario)->where('Requerimiento_id',$Ids->idRequerimiento)->where('Seccion_id', $Ids->idSeccion)->update(['notaComision' => $notaSumItems->sumaItem]);

         $notaSecciones=\DB::select('SELECT sum(nota_seccions.notaComision) as suma FROM nota_seccions, requerimientos,seccions WHERE nota_seccions.user_id=? AND nota_seccions.Requerimiento_id=requerimientos.id AND nota_seccions.Seccion_id=seccions.id AND requerimientos.id=?',[$idUsuario, $Ids->idRequerimiento])[0];

         \App\NotaRequerimiento::where('user_id',$idUsuario)->where('Requerimiento_id',$Ids->idRequerimiento)->update(['notaComision' => $notaSecciones->suma]);

         return redirect()->back();

    }

    public function siguiente($idConvocatoria, $idUsuario, $contador){
        //muestra el formulario para realizar las evaluacioenes
        $contador+=1;    
        $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
        if($contador<count($secciones)){
        $subsecciones=\DB::select('SELECT subseccions.*  from subseccions, seccions, requerimientos ,convocatorias where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and convocatorias.id=requerimientos.convocatoria_id and subseccions.seccion_id=? AND convocatorias.id=?',[$secciones[$contador]->id,$idConvocatoria]);
        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
        


        return view('evaluador.evaluar')->with(compact('idConvocatoria', 'secciones','subsecciones','items','contador','idUsuario'));
        }
        else{
            $postulantes=\DB::select('SELECT users.id , users.name, users.apellidos, users.email  from users ,nota_requerimientos, requerimientos , convocatorias WHERE users.id=nota_requerimientos.user_id AND requerimientos.id=nota_requerimientos.Requerimiento_id AND convocatorias.id=requerimientos.convocatoria_id AND convocatorias.id=? GROUP BY users.id',[$idConvocatoria]);
            $idRequerimiento=\DB::select('SELECT requerimientos.id FROM requerimientos, convocatorias WHERE requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria])[0];
            \App\NotaRequerimiento::where('user_id',$idUsuario)->where('Requerimiento_id',$idRequerimiento->id)->update(['evaluado' => true]);

            return view('evaluador.showEvaluador')->with(compact('idConvocatoria', 'postulantes'));
        }


        
    }
}
