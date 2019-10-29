<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->string('contrasenia');
            $table->string('profesion')->nullable();
            $table->boolean('postular');
            $table->boolean('evaluar');
            $table->boolean('verConv');
            $table->boolean('editarConv');
            $table->boolean('crearConv');
            $table->boolean('bajaConv');
            $table->boolean('verReportes');

            $table->integer('ComisionCalificadora_id')->unsigned();
            $table->foreign('ComisionCalificadora_id')->references('id')->on('comision_calificadoras')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
