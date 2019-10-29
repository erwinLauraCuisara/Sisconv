<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComisionCalificadora extends Model
{
    public function usuarios(){
        return $this->belongsToMany('App\usuario');
    }
}
