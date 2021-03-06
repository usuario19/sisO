<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGanadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganadors', function (Blueprint $table) {
            $table->increments('id_ganador');
            $table->integer('posicion_ganador');
            $table->integer('id_participacion')->unsigned();
            $table->foreign('id_participacion')->references('id_participacion')->on('participaciones')->onDelete('cascade');
                
            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs')->onDelete('cascade');

            $table->integer('id_jugador')->unsigned()->nullable();
            $table->foreign('id_jugador')->references('id_jugador')->on('jugadores')->onDelete('cascade');
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
        Schema::dropIfExists('ganadors');
    }
}
