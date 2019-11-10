<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoitemsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupoitems_items', function (Blueprint $table) {
            $table->integer('Item_id')->unsigned();
            $table->integer('GrupoItems_id')->unsigned();
            $table->unique(['GrupoItems_id','Item_id']);
            $table->foreign('Item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('GrupoItems_id')->references('id')->on('grupo_items')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('grupoitems_items');
    }
}
