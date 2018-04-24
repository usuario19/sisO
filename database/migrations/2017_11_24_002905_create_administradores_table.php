<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->increments('id_administrador');
            $table->integer('ci')->unique();;
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('genero');
            $table->date('fecha_nac');
            $table->string('foto_admin');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->text('descripcion_admin');
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
        Schema::dropIfExists('administradores');
    }
}