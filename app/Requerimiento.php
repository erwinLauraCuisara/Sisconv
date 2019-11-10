<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    public function archivos(){
        return $this->morphMany('App\Archivo','archivoTable');
    }
    public function convocatorias(){
        return $this->hasMany('App\convocatoria');
    }
    public function usuarios(){
        return $this->belongsToMany('App\usuario')->using('App\Requerimiento_usuario');
    }
    public function seccions(){
        return $this->belongsToMany(Seccion::class);
    }
}
