<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPosicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_posicions', function (Blueprint $table) {
            $table->increments('id_tabla_posicion');
            $table->integer('pj')->default(0);
            $table->integer('pg')->default(0);
            $table->integer('pp')->default(0);
            $table->integer('pe')->default(0);
            $table->integer('puntos')->default(0);

            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs')->onDelete('cascade');
            
            $table->integer('id_fase')->unsigned();
            $table->foreign('id_fase')->references('id_fase')->on('fases')->onDelete('cascade');
           
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
        Schema::dropIfExists('tabla_posicions');
    }
}
