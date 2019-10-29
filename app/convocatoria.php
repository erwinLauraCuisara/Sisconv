<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class convocatoria extends Model
{

    public function archivos(){
        return $this->morphMany('App\Archivo','archivoTable');
    }
    public function comisionCalificadoras(){
        return $this->hasMany('App\ComisionCalificadora');
    }
    public function usuarios(){
        return $this->belongsToMany('App\usuario');
    }

}
