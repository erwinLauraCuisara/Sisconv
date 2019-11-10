<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionSubseccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_subseccion', function (Blueprint $table) {
            $table->integer('seccion_id')->unsigned();
            $table->integer('subseccion_id')->unsigned();
            $table->unique(['seccion_id','subseccion_id']);
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subseccion_id')->references('id')->on('subseccions')->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::dropIfExists('seccion_grupoitems');
    }
}
