<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('celular');
            $table->string('email')->unique();
            $table->string('contrasenia')->nullable();
            $table->string('profesion');
            $table->boolean('postular')->nullable();
            $table->boolean('evaluar')->nullable();
            $table->boolean('verConv')->nullable();
            $table->boolean('editarConv')->nullable();
            $table->boolean('crearConv')->nullable();
            $table->boolean('bajaConv')->nullable();
            $table->boolean('verReportes')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
