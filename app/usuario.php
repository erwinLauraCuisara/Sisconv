<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    public function archivos(){
        return $this->morphMany('App\Archivo','archivoTable');
    }
    public function convocatorias(){
        return $this->belongsToMany('App\convocatoria');
    }
    public function ComisionCalificadoras(){
        return $this->belongsToMany('App\ComisionCalificadora');
    }
    public function Requisitos(){
        return $this->belongsToMany('App\Requisito')->using('App\Requisito_usuario');
    }
    public function Requerimientos(){
        return $this->belongsToMany('App\Requerimiento')->using('App\Requerimiento_usuario');
    }
}
