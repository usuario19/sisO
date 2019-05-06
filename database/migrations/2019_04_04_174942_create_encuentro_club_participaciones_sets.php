<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentroClubParticipacionesSets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuentro_club_participaciones_sets', function (Blueprint $table) {
            $table->increments('id_encuentro_club_part_set');
            $table->integer('puntos')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('puntos_set1')->nullable();
            $table->integer('puntos_set2')->nullable();
            $table->integer('puntos_set3')->nullable();
            $table->integer('puntos_set4')->nullable();
            $table->integer('puntos_set5')->nullable();
            $table->integer('set_ganados')->nullable();
            $table->integer('set_jugados')->nullable();
            
            $table->integer('id_encuentro')->unsigned();
            $table->foreign('id_encuentro')->references('id_encuentro')->on('encuentros')->onDelete('cascade');

            $table->integer('id_fase')->unsigned();
            $table->foreign('id_fase')->references('id_fase')->on('fases')->onDelete('cascade');

            $table->integer('id_club_part')->unsigned();
            $table->foreign('id_club_part')->references('id_club_part')->on('club_participaciones')->onDelete('cascade');
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
        Schema::dropIfExists('encuentro_club_participaciones_sets');
    }
}
