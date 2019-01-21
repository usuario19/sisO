<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->increments('id_aviso');
            $table->string('titulo');
            $table->timestamp('fecha_ini_aviso');
            $table->date('fecha_fin_aviso')->nullable();
            $table->text('contenido');
            $table->integer('id_administrador')->unsigned();
            $table->foreign('id_administrador')->references('id_administrador')->on('administradores')->onDelete('cascade');
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
        Schema::dropIfExists('avisos');
    }
}
