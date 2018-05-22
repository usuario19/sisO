<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugador__clubs', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs');

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
        Schema::dropIfExists('jugador__clubs');
    }
}
