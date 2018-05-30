<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fases', function (Blueprint $table) {
            $table->increments('id_fase');
            $table->string('nombre_fase');
<<<<<<< HEAD

           // $table->integer('id_seleccion')->unsigned();
            //$table->foreign('id_seleccion')->references('id_seleccion')->on('seleccions')->onDelete('cascade');
=======
            
            $table->integer('id_participacion')->unsigned();
            $table->foreign('id_participacion')->references('id_participacion')->on('participaciones')->onDelete('cascade');
>>>>>>> refs/remotes/origin/master
            
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
        Schema::dropIfExists('fases');
    }
}