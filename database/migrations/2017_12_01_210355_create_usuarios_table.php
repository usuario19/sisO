<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario')->primary;
            $table->integer('ci');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('genero');
            $table->date('fecha_nac');
            $table->string('foto');
            $table->string('email',100)->unique();
            $table->text('descripcion_usuario');
            $table->string('password');
            $table->integer('id_club')->unsigned()->nullable();
            $table->foreign('id_club')->references('id_club')->on('clubs');
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
        Schema::dropIfExists('usuarios');
    }
}
