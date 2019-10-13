<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable;
            $table->string('area');
            $table->string('descripcion',255);
            $table->dateTime('fechaIni');
            $table->dateTime('fechaFin');
           
           
            
          //  $table->dateTime('fechaPublicRes');
         //   $table->string('tipo')->nullable;
            $table->boolean('visible')->default(true);
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convocatorias');
    }
}
