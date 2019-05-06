<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentroSeleccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuentro_seleccions', function (Blueprint $table) {
            $table->increments('id_encuentro_seleccion');
            $table->integer('posicion')->nullable();//goles
            $table->time('tiempo')->nullable();
            $table->integer('tr')->nullable();
            $table->integer('ta')->nullable();
            $table->integer('puntos_set1')->nullable();
            $table->integer('puntos_set2')->nullable();
            $table->integer('puntos_set3')->nullable();
            $table->integer('puntos_set4')->nullable();
            $table->integer('puntos_set5')->nullable();
            $table->integer('set_jugados')->nullable();
            $table->integer('set_ganados')->nullable();
            $table->integer('faltas')->nullable();
            $table->integer('puntos_tiempo_extra')->nullable();
            $table->integer('penales')->nullable();
            
            $table->string('observacion')->nullable();

            $table->integer('id_encuentro')->unsigned();
            $table->foreign('id_encuentro')->references('id_encuentro')->on('encuentros')->onDelete('cascade');
                
            /* $table->integer('id_fase')->unsigned();
            $table->foreign('id_fase')->references('id_fase')->on('fases')->onDelete('cascade'); */

            $table->integer('id_seleccion')->unsigned();
            $table->foreign('id_seleccion')->references('id_seleccion')->on('selecciones')->onDelete('cascade');
                
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
        Schema::dropIfExists('encuentro_seleccions');
    }
}
