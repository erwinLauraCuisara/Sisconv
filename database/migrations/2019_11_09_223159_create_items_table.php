<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subseccion_id')->unsigned();
            $table->foreign('subseccion_id')->references('id')->on('subseccions')->onDelete('cascade')->onUpdate('cascade');
            $table->double('notaPorItem');
            $table->string('nombre');
            $table->string('descripcion',255)->nullable();
            $table->integer('puntoNumero')->nullable();
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
        Schema::dropIfExists('items');
    }
}
