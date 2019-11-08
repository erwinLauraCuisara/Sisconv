<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoRequerimientosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoReqUsuarios', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->integer('GrupoReq_oid')->unsigned();
            $table->integer('convocatoria_id')->unsigned();
            $table->unique(['usuario_id','GrupoReq_oid','convocatoria_id']);
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('GrupoReq_oid')->references('id')->on('grupo_requerimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('grupo_requerimientos_usuarios');
    }
}
