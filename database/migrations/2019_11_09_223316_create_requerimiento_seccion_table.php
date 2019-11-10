<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientoSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimiento_seccion', function (Blueprint $table) {
            $table->integer('requerimiento_id')->unsigned()->nullable();
            $table->integer('seccion_id')->unsigned()->nullable();
            $table->unique(['requerimiento_id','Seccion_id']);
            $table->foreign('requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('requerimiento_seccions');
    }
}
