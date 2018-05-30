<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminClubs', function (Blueprint $table) {

            $table->increments('id_adminClub');
            $table->integer('id_administrador')->unsigned();
            $table->foreign('id_administrador')->references('id_administrador')->on('administradores')->onDelete('cascade');
            $table->integer('estado_coordinador');
            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs')->onDelete('cascade');
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
        Schema::dropIfExists('adminClubs');
    }
}
