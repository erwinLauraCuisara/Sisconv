<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatoria_usuarios', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->integer('convocatoria_id')->unsigned();
            $table->unique(['usuario_id','convocatoria_id']);
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('convocatoria_usuarios');
    }
}
