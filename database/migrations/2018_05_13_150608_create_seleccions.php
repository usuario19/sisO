<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeleccions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleccions', function (Blueprint $table) {
            $table->increments('id_seleccion');
            $table->string('nombre_seleccion');

            $table->integer('id_inscripcion')->unsigned();
            $table->foreign('id_inscripcion')->references('id_inscripcion')->on('inscripciones')->onDelete('cascade');
            $table->integer('id_jug_part')->unsigned();
            $table->foreign('id_jug_part')->references('id_jug_part')->on('jugador_participaciones')->onDelete('cascade');
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
        Schema::dropIfExists('seleccions');
    }
}
