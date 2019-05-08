<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipanteGanadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante_ganadors', function (Blueprint $table) {
            $table->increments('id_participante_ganador');
            $table->integer('posicion_participante');
            $table->integer('id_participacion')->unsigned();
            $table->foreign('id_participacion')->references('id_participacion')->on('participaciones')->onDelete('cascade');
            $table->integer('id_jug_club')->unsigned();
            $table->foreign('id_jug_club')->references('id_jug_club')->on('jugador_clubs')->onDelete('cascade');    
            /* $table->integer('id_jugador')->unsigned();
            $table->foreign('id_jugador')->references('id_jugador')->on('jugadores')->onDelete('cascade'); */
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
        Schema::dropIfExists('paticipante_ganadors');
    }
}
