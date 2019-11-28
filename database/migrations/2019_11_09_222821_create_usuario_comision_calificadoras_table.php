<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioComisionCalificadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuarioComCalf', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('ComisionCalificadora_id')->unsigned()->nullable();
            $table->unique(['user_id','ComisionCalificadora_id']);
            $table->foreign('ComisionCalificadora_id')->references('id')->on('comisionCalificadora')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_comision_calificadoras');
    }
}
