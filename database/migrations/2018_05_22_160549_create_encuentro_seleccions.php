<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentroSeleccions extends Migration
{
    public function up()
    {
        Schema::create('encuentro_seleccions', function (Blueprint $table) {
            $table->increments('id_encuentro_seleccion');
            $table->integer('puntos');
            $table->text('observacion');
            $table->string('resultado');

            $table->integer('id_encuentro')->unsigned();
            $table->foreign('id_encuentro')->references('id_encuentro')->on('encuentros')->onDelete('cascade');

            $table->integer('id_seleccion')->unsigned();
            $table->foreign('id_seleccion')->references('id_seleccion')->on('seleccions')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('encuentro_seleccions');
    }
}
