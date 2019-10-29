<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaImportante extends Model
{
    public function convocatorias(){
        return $this->hasMany('App\convocatorias');
    }
}
