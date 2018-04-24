<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JugadorInscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('jugador_inscripciones', function (Blueprint $table) {
            $table->increments('id_insc_jug');
            $table->integer('id_inscripcion')->unsigned();
            $table->foreign('id_inscripcion')->references('id_inscripcion')->on('inscripciones');
            $table->integer('id_jugador')->unsigned();
            $table->foreign('id_jugador')->references('id_jugador')->on('jugadores');
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
        //
        Schema::dropIfExists('jugadorInscripciones');
    }
}
