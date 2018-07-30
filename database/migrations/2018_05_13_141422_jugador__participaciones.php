<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JugadorParticipaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('jugador_participaciones', function (Blueprint $table) {
            $table->increments('id_jug_part');
            $table->integer('id_jugador')->unsigned();
            $table->foreign('id_jugador')->references('id_jugador')->on('jugadores')->onDelete('cascade');

            $table->integer('id_participacion')->unsigned();
            $table->foreign('id_participacion')->references('id_participacion')->on('participaciones')->onDelete('cascade');
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
        Schema::dropIfExists('jugador_participaciones');
    }
}
