<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_items', function (Blueprint $table) {
            $table->timestamps();
            $table->double('notaComision')->nullable();
            $table->double('notaParcial')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('Requerimiento_id')->unsigned()     ;
            $table->integer('Item_id')->unsigned();
            $table->integer('Archivo_id')->unsigned();
            $table->unique(['user_id','Requerimiento_id','Item_id','Archivo_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Requerimiento_id')->references('id')->on('requerimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Archivo_id')->references('id')->on('archivos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_items');
    }
}
