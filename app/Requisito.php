<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    public function archivos(){
        return $this->morphMany('App\Archivo','archivoTable');
    }
    public function convocatorias(){
        return $this->hasMany('App\convocatorias');
    }
    public function usuarios(){
        return $this->belongsToMany('App\usuario')->using('App\Requisito_usuario');
    }
}
