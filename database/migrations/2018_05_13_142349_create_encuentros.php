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
            $table->date('fecha');
            $table->time('hora');
            $table->string('ubicacion');
            $table->text('detalle')->nullable();
           
            $table->integer('id_fecha')->unsigned();
            $table->foreign('id_fecha')->references('id_fecha')->on('fechas')->onDelete('cascade');
           
            $table->timestamps();
        });
    }
  
    public function down()
    {
        Schema::dropIfExists('encuentros');
    }
}
