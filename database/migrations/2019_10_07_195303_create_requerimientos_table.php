<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fechaIni')->nullable();
            $table->datetime('fechaFin')->nullable();
            $table->double('porcentajeNota');
            $table->integer('GrupoRequerimiento_id')->unsigned();
            $table->foreign('GrupoRequerimiento_id')->references('id')->on('grupo_requerimientos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('requerimientos');
    }
}
