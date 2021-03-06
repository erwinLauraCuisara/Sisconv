<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellidos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profesion')->nullable();
            $table->boolean('postular')->default(true);
            $table->boolean('validar')->default(false);
            $table->boolean('evaluar')->default(false);
            $table->boolean('editarConv')->default(false);
            $table->boolean('crearConv')->default(false);
            $table->boolean('borrarConv')->default(false);
            $table->boolean('verReportes')->default(false);
            $table->rememberToken();
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
