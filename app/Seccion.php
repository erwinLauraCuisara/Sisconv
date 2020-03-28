<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    public function requerimientos(){
        return $this->belongsToMany(Requerimiento::class);
    }
    public function subseccions(){
        return $this->belongsToMany(Subseccion::class);
    }

    
}
