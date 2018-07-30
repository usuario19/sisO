<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubParticipacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_participaciones', function (Blueprint $table) {
            $table->increments('id_club_part');
            $table->integer('id_gestion')->unsigned();
            $table->foreign('id_gestion')->references('id_gestion')->on('gestiones')->onDelete('cascade');
            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs')->onDelete('cascade');
            $table->integer('id_disc')->unsigned();
            $table->foreign('id_disc')->references('id_disc')->on('disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('club_participaciones');
    }
}
