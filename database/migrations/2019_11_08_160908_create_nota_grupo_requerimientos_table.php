<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaGrupoRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_grupo_requerimientos', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->integer('GrupoReq_id')->unsigned();
            $table->unique(['usuario_id','GrupoReq_id']);
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('GrupoReq_id')->references('id')->on('grupo_requerimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->double('nota');
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
        Schema::dropIfExists('nota_grupo_requerimientos');
    }
}
