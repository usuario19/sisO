44<?php

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
            $table->integer('id_participacion')->unsigned();
            $table->foreign('id_participacion')->references('id_participacion')->on('participaciones');

            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs');
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
        Schema::dropIfExists('clubParticipaciones');
    }
}