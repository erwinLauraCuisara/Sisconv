<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasGrupoRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias_grup', function (Blueprint $table) {
            $table->integer('GrupoReq_oid')->unsigned();
            $table->integer('convocatoria_id')->unsigned();
            $table->unique(['GrupoReq_oid','convocatoria_id']);
            $table->foreign('GrupoReq_oid')->references('id')->on('grupo_requerimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('convocatorias_grupo_requerimientos');
    }
}
