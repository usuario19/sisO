<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPosicionesSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_posiciones_sets', function (Blueprint $table) {
            $table->increments('id_tabla_posiciones_set');
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

            $table->integer('id_club_part')->unsigned();
            $table->foreign('id_club_part')->references('id_club_part')->on('club_participaciones')->onDelete('cascade');
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
        Schema::dropIfExists('tabla_posiciones_sets');
    }
}
