<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subseccion extends Model
{
    public function seccions(){
        return $this->belongsToMany(Seccion::class);
    }
    public function items(){
        return $this->belongsToMany(Item::class);
    }
}
