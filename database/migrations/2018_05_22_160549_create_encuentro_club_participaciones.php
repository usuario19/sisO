<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentroClubParticipaciones extends Migration
{
    public function up()
    {
        Schema::create('encuentro_club_participaciones', function (Blueprint $table) {
            $table->increments('id_encuentro_club_part');
            $table->integer('puntos')->nullable();
            $table->text('observacion')->nullable();
            $table->string('resultado')->nullable();

            $table->integer('id_encuentro')->unsigned();
            $table->foreign('id_encuentro')->references('id_encuentro')->on('encuentros')->onDelete('cascade');

            $table->integer('id_club_part')->unsigned();
            $table->foreign('id_club_part')->references('id_club_part')->on('club_participaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('encuentro_club_participaciones');
    }
}
