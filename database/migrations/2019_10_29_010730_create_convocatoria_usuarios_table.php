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
        Schema::create('postula', function (Blueprint $table) {
            $table->string('codigo');
            $table->boolean('valido')->default(false);
            $table->integer('user_id')->unsigned();
            $table->integer('convocatoria_id')->unsigned();
            $table->unique(['user_id','convocatoria_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
