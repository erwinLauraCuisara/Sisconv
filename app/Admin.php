<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    protected $fillable=[
        'nombre',
        'email',
        'password',
        'apellidos',
        'rol',
        'telefono',
        'celular',
        'profesion',
        'postular',
        'validar',
        'evaluar',
        'editarConv',
        'borrarConv',
        'verReportes',
    ];
    protected $hidden =[
        'password','remember_token',
    ];
    public function archivos(){
        return $this->morphMany('App\Archivo','archivoTable');
    }
    public function convocatorias(){
        return $this->belongsToMany('App\convocatoria');
    }
    public function ComisionCalificadoras(){
        return $this->belongsToMany('App\ComisionCalificadora');
    }
    public function Requisitos(){
        return $this->belongsToMany('App\Requisito')->using('App\Requisito_usuario');
    }
    public function Requerimientos(){
        return $this->belongsToMany('App\Requerimiento')->using('App\Requerimiento_usuario');
    }
}