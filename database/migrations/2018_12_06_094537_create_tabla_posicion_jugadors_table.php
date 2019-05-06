<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPosicionJugadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_posicion_jugadors', function (Blueprint $table) {
            $table->increments('id_tabla_posicion_jugadors');
            $table->integer('cantidad_encuentros')->nullable();
            $table->integer('posicion')->nullable();
            $table->integer('pj')->default(0);
            $table->integer('pg')->default(0);
            $table->integer('pp')->default(0);
            $table->integer('pe')->default(0);
            $table->integer('sf')->default(0);
            $table->integer('sc')->default(0);
            $table->integer('ds')->default(0);
            $table->integer('pf')->default(0);
            $table->integer('pc')->default(0);
            $table->integer('dp')->default(0);
            $table->integer('puntos')->default(0);
            $table->time('tiempo_total')->nullable();
            $table->integer('id_seleccion')->unsigned();
            $table->foreign('id_seleccion')->references('id_seleccion')->on('selecciones')->onDelete('cascade');
            
            $table->integer('id_disc')->unsigned();
            $table->foreign('id_disc')->references('id_disc')->on('disciplinas')->onDelete('cascade');
            
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
        Schema::dropIfExists('tabla_posicion_jugadors');
    }
}
