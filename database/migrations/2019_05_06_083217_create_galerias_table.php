<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerias', function (Blueprint $table) {
            $table->increments('id_galeria');
            $table->string('titulo');
            $table->date('fecha_publicacion');
            $table->string('foto')->default('imagenes.png');
            $table->text('comentario');
            $table->integer('id_gestion')->unsigned()->nullable();
            $table->foreign('id_gestion')->references('id_gestion')->on('gestiones')->onDelete('cascade');
            $table->integer('id_disc')->unsigned()->nullable();
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
        Schema::dropIfExists('galerias');
    }
}
