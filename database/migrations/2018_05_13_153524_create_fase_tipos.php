<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaseTipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fase_tipos', function (Blueprint $table) {
            
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('cascade');
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
        Schema::dropIfExists('fase_tipos');
    }
}
