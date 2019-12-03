<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostularController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getRequisitosIndispensables($idConvocatoria , Request $request){
        $mensaje="codigo incorrecto porfabor vuelva a intentarlo";
        $codigo=request()->except("_token");
        $convocatoria=\App\convocatoria::find($idConvocatoria);
        $requisitosIndispensables=\DB::select("SELECT requisitos.* from convocatorias, requisitos where requisitos.convocatoria_id=? and requisitos.indispensable=1 AND convocatorias.id=requisitos.convocatoria_id",[$idConvocatoria]);
        if($convocatoria->codigo==$codigo['codigo']){
            $mensaje="";
           
            return view('postulante.requisitosIndispensables')->with(compact('idConvocatoria', 'requisitosIndispensables'));
        }
        else{
            return view('postulante.codigo')->with(compact('idConvocatoria' ,'mensaje'));
        }
    }

    public function setRequisitosIndispensables($idConvocatoria , Request $request){

        // En realidad es agregar requisitos indispensables y no set

        $ids=request()->except("_token");
        $idUsuario=\Auth::user()->id;
        $sub_path="storage/convocatorias/$idConvocatoria/reqIndispensables";
        $destino_path=public_path($sub_path);
        if (!file_exists($destino_path)) {
                mkdir($destino_path, 0777, true);
                }
                foreach ($ids as $idRequisito =>$value) {
              
               $pdf=$request->file($idRequisito);
               $nombreArchivo="$idConvocatoria"."$idRequisito"."$idUsuario".".pdf";
               $pdf->move($destino_path,$nombreArchivo);
               try {
                $archivo=new \App\Archivo;
                $archivo->ruta="$sub_path"."/"."$nombreArchivo";
                $archivo->tipo="requisito indispensable";
                $archivo->Requisito_id=$idRequisito;
                $archivo->user_id=$idUsuario;
                $archivo->convocatoria_id=$idConvocatoria;
                $archivo->user_id=$idUsuario;
                $archivo->save();

                $data=new \App\Req_usuario;
                $data->user_id = $idUsuario;
                $data->Requisito_id = $idRequisito;
                $data->convocatoria_id =$idConvocatoria;
                $data->save();

                } catch (\Illuminate\Database\QueryException $ex) {
            
                //
                    }
        }


            $requisitosGenerales=\DB::select("SELECT requisitos.* from convocatorias, requisitos where requisitos.convocatoria_id=? and requisitos.indispensable=0 and convocatorias.id=requisitos.convocatoria_id",[$idConvocatoria]);
           return view('postulante.requisitosGenerales')->with(compact('idConvocatoria', 'requisitosGenerales'));
       }


    public function addRequisitosGenerales($idConvocatoria, $contador , Request $request){
        $ids=request()->except("_token");
        if(!isset($ids['xd'])){  
        $idUsuario=\Auth::user()->id;
        $sub_path="storage/convocatorias/$idConvocatoria/reqGenerales";
        $destino_path=public_path($sub_path);
        if (!file_exists($destino_path)) {
                mkdir($destino_path, 0777, true);
                }
        foreach ($ids as $idRequisito =>$value) {
       try {
        $pdf=$request->file($idRequisito);
        $nombreArchivo="$idConvocatoria"."$idRequisito"."$idUsuario".".pdf";
        $pdf->move($destino_path,$nombreArchivo);
        $archivo=new \App\Archivo;
        $archivo->ruta="$sub_path"."/"."$nombreArchivo";
        $archivo->tipo="requisito general";
        $archivo->Requisito_id=$idRequisito;
        $archivo->user_id=$idUsuario;
        $archivo->convocatoria_id=$idConvocatoria;
        $archivo->user_id=$idUsuario;
        $archivo->save();
        $data=new \App\Req_usuario;
        $data->user_id = $idUsuario;
        $data->Requisito_id = $idRequisito;
        $data->convocatoria_id =$idConvocatoria;
        $data->save();
        //$contador=0;
        
        } catch (\Illuminate\Database\QueryException $ex) {
            
           
            }
        
        }
        }
        else{
            $contador+=1;
        }

        $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?  ORDER BY seccions.id',[$idConvocatoria]);
        //return $contador;
        if($contador<count($secciones)){
        $subsecciones=\DB::select('SELECT subseccions.*  from subseccions, seccions, requerimientos ,convocatorias where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and convocatorias.id=requerimientos.convocatoria_id and subseccions.seccion_id=? AND convocatorias.id=?',[$secciones[$contador]->id,$idConvocatoria]);
        

        $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);
        


           return view('postulante.items')->with(compact('idConvocatoria', 'secciones','subsecciones','items','contador'));
       }
       else{
        return view('postulante.RegistroCompletado');
       }
     
       }

       public function addItems(Request $request, $idItem ,$contador){

           // $ids=$request->all()->except("_token");;
            $idConvocatoria=\DB::select('SELECT convocatorias.id FROM convocatorias, requerimientos, seccions, subseccions, items WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND items.id=?',[$idItem])[0]->id;
            $sub_path="storage/convocatorias/$idConvocatoria/items";
            $destino_path=public_path($sub_path);
            $idUsuario=\Auth::user()->id;
            if (!file_exists($destino_path)) {
                mkdir($destino_path, 0777, true);
                }
            
                  
            if($pdfs=$request->file($idItem)){
               foreach($pdfs as $pdf){
                $real_name=$pdf->getClientOriginalName();
                if(!\DB::table('archivos')->where('Item_id',$idItem)->where('user_id',$idUsuario)->where('nombreOriginal',$real_name)->exists()){
                $archivo=new \App\Archivo;
                
                $archivo->tipo="item";
                $archivo->Item_id=$idItem;
                $archivo->nombreOriginal=$real_name;
                $archivo->user_id=$idUsuario;
                $archivo->convocatoria_id=$idConvocatoria;
                $archivo->user_id=$idUsuario;
                
                $nombreArchivo="$idConvocatoria"."$idItem"."$idUsuario".".$real_name".".pdf";
                $archivo->ruta="$sub_path"."/"."$nombreArchivo";
                $pdf->move($destino_path,$nombreArchivo);
                $archivo->save();
                }
                }
            }
            $secciones=\DB::select('SELECT seccions.* , convocatorias.titulo as convocatoriaTitulo FROM convocatorias,seccions, requerimientos WHERE convocatorias.id=requerimientos.convocatoria_id and seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=?',[$idConvocatoria]);
            $subsecciones=\DB::select('SELECT subseccions.*  from subseccions, seccions, requerimientos ,convocatorias where subseccions.seccion_id=seccions.id and seccions.requerimiento_id=requerimientos.id and convocatorias.id=requerimientos.convocatoria_id and subseccions.seccion_id=? AND convocatorias.id=?',[$secciones[$contador]->id,$idConvocatoria]);
             $items=\DB::select('SELECT items.* FROM items, seccions, subseccions, requerimientos,convocatorias WHERE items.subseccion_id=subseccions.id AND subseccions.seccion_id=seccions.id AND seccions.requerimiento_id=requerimientos.id AND requerimientos.convocatoria_id=convocatorias.id AND convocatorias.id=?',[$idConvocatoria]);

        return view('postulante.items')->with(compact('idConvocatoria', 'secciones','subsecciones','items','contador'));
            
            
            
        
    }


    

        
        
        

    
}
