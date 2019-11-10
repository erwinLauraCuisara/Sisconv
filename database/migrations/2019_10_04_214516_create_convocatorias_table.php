<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('area')->nullable();
            $table->string('descripcion',255)->nullable();
            $table->dateTime('fechaIni');
            $table->dateTime('fechaFin');
            $table->dateTime('fechaPublicRes')->nullable();
         //   $table->string('tipo')->nullable;
            $table->string('gestion')->nullable();
            $table->boolean('visible')->default(true);
            $table->string('imagen')->nullable();
            $table->string('pdf')->nullable();
            $table->string('materia')->nullable();
            $table->dateTime('fechaLimRequisitos')->nullable();
            $table->dateTime('fechaLimRequerimientos')->nullable();
            $table->integer('ComisionCalificadora_id')->unsigned()->nullable();
            $table->foreign('ComisionCalificadora_id')->references('id')->on('comisionCalificadora')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('convocatorias');
    }
}
