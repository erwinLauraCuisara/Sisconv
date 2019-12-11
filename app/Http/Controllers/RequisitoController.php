<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\NotaSeccion;
use App\Requisito;
use Illuminate\Http\Request;
use App\Requisito_usuario;

class RequisitoController extends Controller
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
    public function create($prueba)
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
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function show($requisito)
    {
        // = array('id' =>"$requisito");
            
         return view('convocatorias.formRequisitos')->with(compact('requisito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisito $requisito)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisito $requisito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisito  $requisito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisito=Requisito::find($id);
        $id=$requisito->convocatoria_id;
        $requisito->delete();
     
        return redirect(route('requisitos.show', $id));
    }

    public function agregar($requisito, Request $request)
    {
        //return "holaa este es el id:". $requisito.$request;
        $datosRequisito=request()->except("_token");

        if(!isset($datosRequisito['Indispensable'])){
                $datosRequisito['Indispensable']=false;
        }

        $data=new Requisito;
        $data->nombre = $datosRequisito['Titulo'];
        $data->convocatoria_id = $requisito;
        $data->indispensable = $datosRequisito['Indispensable'];
        $data->descripcion = $datosRequisito['descripcion'];
        $data->save();
        $convocatoria=\App\convocatoria::find($requisito);
        $convocatoria->fechaLimRequisitos=$datosRequisito['fechaFin'];
        $convocatoria->save();


        //return view('convocatorias.formRequisitos')->with(compact('requisito'));
        return redirect(route('requisitos.show', $requisito));
    }

    public function receptorShow($idConvocatoria)
    {
        $postulantes=\DB::select('SELECT users.id , users.name, users.apellidos, users.email  from users , req_usuarios , convocatorias WHERE users.id=req_usuarios.user_id AND req_usuarios.convocatoria_id=convocatorias.id AND convocatorias.id=? GROUP BY users.id',[$idConvocatoria]);
        
        $validados=\DB::select('SELECT validados.validado, users.id FROM validados , users , convocatorias WHERE validados.user_id=users.id AND validados.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
            
         return view('receptor.receptor')->with(compact('idConvocatoria', 'postulantes','validados'));
    }
    public function evaluar($idConvocatoria, $idUser)
    {
        //para listar los requisitos de un usuario
        $requisitos=\DB::select('SELECT requisitos.* , req_usuarios.* FROM requisitos, req_usuarios, convocatorias, users WHERE req_usuarios.user_id=users.id AND req_usuarios.Requisito_id=requisitos.id AND req_usuarios.convocatoria_id=convocatorias.id AND req_usuarios.convocatoria_id=? AND req_usuarios.user_id=?',[$idConvocatoria,$idUser]);
            
         return view('receptor.evaluar')->with(compact('requisitos','idConvocatoria', 'idUser'));
    }
    public function evaluarSave($idConvocatoria, $idUser , Request $request){
    
                $ids=request()->except("_token");
                $requisitos=\DB::select('SELECT requisitos.* FROM requisitos, convocatorias WHERE requisitos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
                $valor=true;
                foreach($requisitos as $requisito){
                    if(!isset($ids[$requisito->id])){
                        $re=\App\Requisito::find($requisito->id)->indispensable;
                        if($re==1){
                                $valor=false;
                        }
                        \App\Req_Usuario::where('Requisito_id',$requisito->id)->where('convocatoria_id',$idConvocatoria)->where('user_id',$idUser)->update(['valido' =>false]);
                    }
                    else{
                        \App\Req_Usuario::where('Requisito_id',$requisito->id)->where('convocatoria_id',$idConvocatoria)->where('user_id',$idUser)->update(['valido' =>true]);
                    }

                }


                foreach ($ids as $idRequisito =>$value) {
                   
                    if(strpos($idRequisito, 't')==true){
                
                        $idReq=str_replace('t','',$idRequisito);

                        $req_usuarios=\App\Req_Usuario::where('Requisito_id',$idReq)->where('convocatoria_id',$idConvocatoria)->where('user_id',$idUser)->update(['observaciones' => $value]);
                    }
                }
                $validado=\App\Validado::where('convocatoria_id',$idConvocatoria)->where('user_id',$idUser)->update(['validado' => $valor]);
            

              
            $postulantes=\DB::select('SELECT users.id , users.name, users.apellidos, users.email  from users , req_usuarios , convocatorias WHERE users.id=req_usuarios.user_id AND req_usuarios.convocatoria_id=convocatorias.id AND convocatorias.id=? GROUP BY users.id',[$idConvocatoria]);
        
            $validados=\DB::select('SELECT validados.validado, users.id FROM validados , users , convocatorias WHERE validados.user_id=users.id AND validados.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
            
            
         //return view('receptor.receptor')->with(compact('idConvocatoria', 'postulantes','validados','idUser'));

         //para validar los items 
        $contador=0;    
        $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
        $subsecciones=\DB::select('SELECT subseccions.*  from subseccions, seccions, requerimientos ,convocatorias where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and convocatorias.id=requerimientos.convocatoria_id and subseccions.seccion_id=? AND convocatorias.id=?',[$secciones[$contador]->id,$idConvocatoria]);
        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);

        return view('receptor.evaluarItem')->with(compact('idConvocatoria', 'secciones','subsecciones','items','contador','idUser'));
    }

    public function evaluarItem(Request $request ,$idConvocatoria, $idUser, $contador){

        $ids=request()->except("_token");

        foreach ($ids as $idArchivo =>$value) {
            if(!isset($value)){
                $value=false;
            }
            \App\Archivo::find($idArchivo)->update(['validado' => $value]);
            $archivo=\App\Archivo::find($idArchivo);
            if($value==true){
                try {
            $nota_maximaItem=\App\Item::find($archivo->Item_id)->notaPorItem;
            $nota_item=new \App\NotaItem;
            $nota_item->notaComision=$nota_maximaItem;
            $nota_item->notaParcial=$nota_maximaItem;
            $nota_item->user_id=$archivo->user_id;
            $nota_item->Item_id=$archivo->Item_id;
            $nota_item->Requerimiento_id=$archivo->Requerimiento_id;
            $nota_item->Archivo_id=$archivo->id;
            $nota_item->save();
            } catch (\Illuminate\Database\QueryException $ex) {
                
               
             }
            }
                
        } 

            $idRequerimiento=\App\Requerimiento::where('convocatoria_id',$idConvocatoria)->get()[0]->id;
            $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
            $idSeccion=$secciones[$contador]->id;
            $notaSumItems=\DB::select('SELECT sum(nota_items.notaComision) as sumaItem from nota_items, items, requerimientos,seccions, subseccions,archivos WHERE nota_items.user_id=? AND nota_items.Item_id=items.id AND nota_items.Requerimiento_id=requerimientos.id AND requerimientos.id=? AND seccions.id=subseccions.seccion_id AND subseccions.id=items.subseccion_id AND seccions.id=? AND archivos.id=nota_items.Archivo_id AND archivos.validado=true ',[$idUser,$idRequerimiento, $idSeccion])[0];
            try {
            $notaMaxSeccion=$secciones[$contador]->NotaMaxima;
            $nota_seccion=new \App\NotaSeccion;
            if($notaMaxSeccion>=$notaSumItems->sumaItem){
            $nota_seccion->notaComision=$notaSumItems->sumaItem;
            $nota_seccion->notaParcial=$notaSumItems->sumaItem;
            }
            else{
            $nota_seccion->notaComision=$notaMaxSeccion;
            $nota_seccion->notaParcial=$notaMaxSeccion; 
            }
            $nota_seccion->user_id=$idUser;
            $nota_seccion->Requerimiento_id=$idRequerimiento;
            $nota_seccion->Seccion_id=$idSeccion;
            $nota_seccion->save();
            } catch (\Illuminate\Database\QueryException $ex) {
                
               
            }
        $contador+=1;    
        
        if($contador<count($secciones)){
        $subsecciones=\DB::select('SELECT subseccions.*  from subseccions, seccions, requerimientos ,convocatorias where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and convocatorias.id=requerimientos.convocatoria_id and subseccions.seccion_id=? AND convocatorias.id=?',[$secciones[$contador]->id,$idConvocatoria]);
        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
        


        return view('receptor.evaluarItem')->with(compact('idConvocatoria', 'secciones','subsecciones','items','contador','idUser'));
        }
        else{
             try {



            $notaSecciones=\DB::select('SELECT sum(nota_seccions.notaComision) as suma FROM nota_seccions, requerimientos,seccions WHERE nota_seccions.user_id=? AND nota_seccions.Requerimiento_id=requerimientos.id AND nota_seccions.Seccion_id=seccions.id AND requerimientos.id=?',[$idUser, $idRequerimiento])[0];
            $postula=new \App\NotaRequerimiento;
            $postula->user_id = $idUser;
            $postula->Requerimiento_id = $idRequerimiento; 
            $postula->notaComision=$notaSecciones->suma;
            $postula->notaParcial=$notaSecciones->suma; 
            $postula->save();

            } catch (\Illuminate\Database\QueryException $ex) {
                
               
            }
             
            $postulantes=\DB::select('SELECT users.id , users.name, users.apellidos, users.email  from users , req_usuarios , convocatorias WHERE users.id=req_usuarios.user_id AND req_usuarios.convocatoria_id=convocatorias.id AND convocatorias.id=? GROUP BY users.id',[$idConvocatoria]);

            $validados=\DB::select('SELECT validados.validado, users.id FROM validados , users , convocatorias WHERE validados.user_id=users.id AND validados.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
             
    
    
        return view('receptor.receptor')->with(compact('idConvocatoria', 'postulantes','validados','idUser'));
        }

    }
}
