<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta');
            $table->string('tipo')->nullable();            
            $table->integer('Requisito_id')->unsigned()->nullable();
            $table->foreign('Requisito_id')->references('id')->on('requisitos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('convocatoria_id')->unsigned();
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Requerimiento_id')->unsigned()->nullable();
            $table->foreign('Requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Item_id')->unsigned()->nullable();
            $table->foreign('Item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('archivos');
    }
}
