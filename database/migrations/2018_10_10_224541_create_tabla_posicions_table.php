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

            $table->integer('id_club_part')->unsigned();
            $table->foreign('id_club_part')->references('id_club_part')->on('club_participaciones')->onDelete('cascade');
           
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tabla_posicions');
    }
}
