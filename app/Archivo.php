<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    public function archivoPoliformico(){
        return $this->morphTo();
    }
}
