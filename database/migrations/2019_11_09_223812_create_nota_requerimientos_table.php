<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_requerimientos', function (Blueprint $table) {
            $table->double('notaComision')->nullable();
            $table->double('notaParcial')->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->integer('Requerimiento_id')->unsigned()->nullable();
            $table->unique(['usuario_id','Requerimiento_id']);
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('nota_requerimientos');
    }
}
