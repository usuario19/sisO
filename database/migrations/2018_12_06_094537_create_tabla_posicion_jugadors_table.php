<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPosicionJugadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_posicion_jugadors', function (Blueprint $table) {
            $table->increments('id_tabla_posicion_jugadors');
            $table->integer('cantidad_encuentros')->nullable();
            $table->integer('posicion')->nullable();
            $table->integer('id_seleccion')->unsigned();
            $table->foreign('id_seleccion')->references('id_seleccion')->on('selecciones')->onDelete('cascade');
            
            $table->integer('id_disc')->unsigned();
            $table->foreign('id_disc')->references('id_disc')->on('disciplinas')->onDelete('cascade');
            
            $table->integer('id_fase')->unsigned();
            $table->foreign('id_fase')->references('id_fase')->on('fases')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_posicion_jugadors');
    }
}
