<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participaciones', function (Blueprint $table) {
            $table->increments('id_participacion');
            $table->integer('id_gestion')->unsigned();
            $table->foreign('id_gestion')->references('id_gestion')->on('gestiones')->onDelete('cascade');;
            
            $table->integer('id_disciplina')->unsigned();
            $table->foreign('id_disciplina')->references('id_disc')->on('disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('participaciones');
    }
}
