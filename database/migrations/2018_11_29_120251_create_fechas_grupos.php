<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechasGrupos extends Migration
{
        public function up()
        {
            Schema::create('fechas_grupos', function (Blueprint $table) {
                $table->integer('id_fecha')->unsigned();
                $table->foreign('id_fecha')->references('id_fecha')->on('fechas')->onDelete('cascade');
                
                $table->integer('id_grupo')->unsigned();
                $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
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
        Schema::dropIfExists('fechas_grupos');
    }
}
