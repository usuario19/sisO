<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id_jugador');
            $table->integer('ci_jugador')->unique();
            $table->string('nombre_jugador');
            $table->string('apellidos_jugador');
            $table->string('genero_jugador');
            $table->date('fecha_nac_jugador');
            $table->string('foto_jugador')->default("usuario-sin-foto.png");
            $table->string('email_jugador',100);
            $table->text('descripcion_jugador')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('jugadores');
    }
}
