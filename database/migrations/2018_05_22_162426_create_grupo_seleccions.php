<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoSeleccions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_seleccions', function (Blueprint $table) {
            $table->integer('id_grupo')->unsigned();
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->integer('id_seleccion')->unsigned();
            $table->foreign('id_seleccion')->references('id_seleccion')->on('seleccions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_seleccion');
    }
}
