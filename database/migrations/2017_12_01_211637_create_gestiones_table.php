<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestiones', function (Blueprint $table) {
            $table->increments('id_gestion');
            $table->string('nombre_gestion');
            $table->string('sede');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->text('desc_gest')->nullable();
            $table->integer('estado_gestion');
            $table->integer('estado_inscripcion')->default('1');
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
        Schema::dropIfExists('gestiones');
    }
}
