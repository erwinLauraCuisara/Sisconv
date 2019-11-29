<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubseccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subseccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descripcion', 255);
            $table->integer('puntoNumero')->nullable();
            $table->integer('seccion_id')->unsigned();
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('grupo_items');
    }
}
