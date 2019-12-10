<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = ['ruta', 'tipo', 'validado', 'nombreOriginal', 'Requisito_id', 'user_id','convocatoria_id','Requerimiento_id','Item_id'];
    public function archivoPoliformico(){
        return $this->morphTo();
    }
}
