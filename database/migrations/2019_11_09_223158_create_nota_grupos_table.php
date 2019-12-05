<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_grupos', function (Blueprint $table) {
            $table->double('notaComision')->nullable();
            $table->double('notaParcial')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('Requerimiento_id')->unsigned()->nullable();
            $table->integer('Subseccion_id')->unsigned()->nullable();
            $table->unique(['user_id','Requerimiento_id','Subseccion_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Subseccion_id')->references('id')->on('subseccions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('nota_grupos');
    }
}
