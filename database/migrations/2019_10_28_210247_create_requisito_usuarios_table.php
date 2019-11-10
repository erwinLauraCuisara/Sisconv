<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_usuario', function (Blueprint $table) {
            $table->boolean('valido')->default(false);
            $table->string('observaciones',255)->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->integer('Requisito_id')->unsigned();
            $table->integer('convocatoria_id')->unsigned();
            $table->unique(['usuario_id','Requisito_id','convocatoria_id']);
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Requisito_id')->references('id')->on('requisitos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('requisito_usuarios');
    }
}
