<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoRequerimiento extends Model
{
    public function Requerimientos(){
        return $this->hasMany('App\Requerimiento');
    }
}
