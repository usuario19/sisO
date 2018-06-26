<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id_inscripcion');
            $table->integer('id_gestion')->unsigned();
            $table->foreign('id_gestion')->references('id_gestion')->on('gestiones')->onDelete('cascade');
            $table->integer('id_adminClub')->unsigned();
            $table->foreign('id_adminClub')->references('id_adminClub')->on('adminClubs')->onDelete('cascade');
            //$table->integer('id_administrador')->unsigned();
            //$table->foreign('id_administrador')->references('id_administrador')->on('administraores');
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
        Schema::dropIfExists('inscripciones');
    }
}
