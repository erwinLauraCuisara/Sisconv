<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function subccions(){
        return $this->belongsToMany(Subseccion::class);
    }
}
