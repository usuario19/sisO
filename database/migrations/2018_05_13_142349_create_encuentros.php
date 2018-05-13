<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuentros extends Migration
{
    public function up()
    {
        Schema::create('encuentros', function (Blueprint $table) {
            $table->increments('id_encuentro');
            $table->string('nombre_encuentro');
            $table->date('fecha');
            $table->time('hora');
            $table->string('ubicacion');
            $table->text('observacion');
            $table->string('resultado');
            $table->timestamps();
        });
    }
  
    public function down()
    {
        Schema::dropIfExists('encuentros');
    }
}
