<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id_disc');
            $table->integer('categoria');
            $table->string('sub_categoria')->nullable();
            $table->integer('tipo');
            //$table->integer('futbol')->nullable();
            $table->string('nombre_disc');
            $table->string('foto_disc')->default('sin_imagen.png');
            $table->string('reglamento_disc')->nullable();
            $table->text('descripcion_disc')->nullable();
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
        Schema::dropIfExists('diciplinas');
    }
}
