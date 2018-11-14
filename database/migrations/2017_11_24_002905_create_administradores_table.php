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
            $table->string('foto_admin')->default('usuario-sin-foto.png');
            $table->string('email',100);
            $table->string('password');
            $table->text('descripcion_admin')->nullable();
            $table->enum('tipo',['Administrador','Coordinador'])->default('Coordinador');
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
