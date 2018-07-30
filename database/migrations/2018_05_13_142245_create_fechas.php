<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechas extends Migration
{
    public function up()
    {
        Schema::create('fechas', function (Blueprint $table) {
            $table->increments('id_fecha');
            $table->string('nombre_fecha');
            
            $table->integer('id_fase')->unsigned();
            $table->foreign('id_fase')->references('id_fase')->on('fases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fechas');
    }
}
