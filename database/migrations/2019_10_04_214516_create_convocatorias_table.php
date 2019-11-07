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
            $table->dateTime('fechaIni')->nullable();
            $table->dateTime('fechaFin')->nullable();
          //  $table->dateTime('fechaPublicRes');
         //   $table->string('tipo')->nullable;
            $table->boolean('visible')->default(true);
            
            //el campo de abajo es para dar de baja una convocatoria;  true= esta dado de baja.
            $table->boolean('baja')->default(false);

            $table->integer('ComisionCalificadora_id')->unsigned()->nullable();
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
        Schema::dropIfExists('convocatorias');
    }
}
