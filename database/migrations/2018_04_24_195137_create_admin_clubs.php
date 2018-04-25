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
            $table->integer('id_administrador')->unsigned();
            $table->foreign('id_administrador')->references('id_administrador')->on('administradores');
            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs');
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
