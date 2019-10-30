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
        $datos['convocatoria']=convocatoria::paginate(5);
        return view('convocatorias.index',$datos);
      //return view('convocatorias.form');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('convocatorias.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$this->validate($request,[

            'fTitulo' => 'required',
            'fFecIni' => 'required',
            'fFecFin' => 'required',
            'fArea' => 'required',
            'fGest' => 'required',
            'fDescrip' => 'required',
            'fView' => 'required',
        ]);

        //$emps = new Employe;

        $emps = new convocatoria;

        $emps->fname = $request->input('titulo');
        $emps->fname = $request->input('area');
        $emps->fname = $request->input('descripcion');
        $emps->fname = $request->input('fechaIni');
        $emps->fname = $request->input('fechaFin');
        //$emps->fname = $request->input('fDescrip');
        $emps->fname = $request->input('visible');
        

        $emps->save();*/

        

       
        $datosConvocatoria=request()->except("_token");
        /*
        foreach ($datosConvocatoria as $datos ) {
            if(!isset($datosConvocatoria['visible'])){
                $datosConvocatoria['visible']=false;
            }

            $request=Convocatoria::insert($datosConvocatoria);
        
        }
        */
        if(!isset($datosConvocatoria['visible'])){
                $datosConvocatoria['visible']=false;
        }
        $data=new convocatoria;
        $data->titulo = $datosConvocatoria['Titulo'];
        $data->area = $datosConvocatoria['area'];
        $data->descripcion = $datosConvocatoria['descripcion'];
        $data->fechaIni = $datosConvocatoria['fechaIni'];
        $data->fechaFin = $datosConvocatoria['fechaFin'];
        $data->visible = $datosConvocatoria['visible'];
        $data->save();
        $id=$data->id;
        

        $imagen=$request->file("imagen");
        $sub_path="storage/convocatorias/$id";
        $destino_path=public_path($sub_path);
        if(mkdir($destino_path, 0777, true)){
        if(isset($imagen)){
            //$real_name=$imagen->getClientOriginalName();
           
            $tamanio = $imagen->getSize();
            $extension = $imagen->getClientOriginalExtension();
            $imagen->move($destino_path,"imagen".".$extension");
        }
        
        $pdf=$request->file("pdf");
        if(isset($pdf)){
            //$real_name=$pdf->getClientOriginalName();
            $tamanio = $pdf->getSize();
            $pdf->move($destino_path,"documento.pdf");
        }
        }

        
        return redirect('convocatorias'); 

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
