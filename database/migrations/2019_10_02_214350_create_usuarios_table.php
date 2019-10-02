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
            $table->string('postular')->nullable();
            $table->string('evaluar')->nullable();
            $table->string('verConv')->nullable();
            $table->string('editarConv')->nullable();
            $table->string('crearConv')->nullable();
            $table->string('bajaConv')->nullable();
            $table->string('verReportes')->nullable();
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
