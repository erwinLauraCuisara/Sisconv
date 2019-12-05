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
            $table->string('nombreOriginal')->nullable();           
            $table->integer('Requisito_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
             $table->integer('convocatoria_id')->unsigned()->nullable();
             $table->integer('Requerimiento_id')->unsigned()->nullable();
             $table->integer('Item_id')->unsigned()->nullable();
             $table->unique(['Requisito_id','user_id','convocatoria_id']);
            $table->foreign('Requisito_id')->references('id')->on('requisitos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('Requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade')->onUpdate('cascade');
            
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
