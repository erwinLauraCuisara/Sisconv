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
            $table->integer('user_id')->unsigned();
            $table->integer('Requisito_id')->unsigned();
            $table->integer('convocatoria_id')->unsigned();
            $table->unique(['user_id','Requisito_id','convocatoria_id']);
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
