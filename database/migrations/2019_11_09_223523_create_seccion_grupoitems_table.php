<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionGrupoitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_grupoitems', function (Blueprint $table) {
            $table->integer('Seccion_id')->unsigned();
            $table->integer('GrupoItems_id')->unsigned();
            $table->unique(['Seccion_id','GrupoItems_id']);
            $table->foreign('Seccion_id')->references('id')->on('seccions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('GrupoItems_id')->references('id')->on('grupo_items')->onDelete('cascade')->onUpdate('cascade');            
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
