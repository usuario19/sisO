<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoClubParticipaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_club_participaciones', function (Blueprint $table) {
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            
            $table->integer('id_club_part')->unsigned();
            $table->foreign('id_club_part')->references('id_club_part')->on('club_participaciones')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_club_participaciones');
    }
}
