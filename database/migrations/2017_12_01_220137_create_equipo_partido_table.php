<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_partido', function (Blueprint $table) {
            $table->integer('id_equipo')->unsigned();
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos')->onDelete('cascade');
            $table->integer('id_partido')->unsigned();
            $table->foreign('id_partido')->references('id_partido')->on('partidos')->onDelete('cascade');
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
        Schema::dropIfExists('equipoPartido');
    }
}
