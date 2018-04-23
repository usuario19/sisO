<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id_equipo');
            $table->string('nombre_equipo');
            $table->text('decsripcion_equipo');

            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs');

            $table->integer('id_disciplina')->unsigned();
            $table->foreign('id_disciplina')->references('id_disc')->on('disciplinas');

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
        Schema::dropIfExists('equipos');
    }
}
