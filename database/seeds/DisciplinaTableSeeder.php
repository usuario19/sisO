<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplinas')->insert([
            'categoria' => 0,
            'tipo' => 0,
           'nombre_disc' => 'futbol',
           'foto_disc' => 'sin_imagen.png',
           'reglamento_disc' => '',
           'descripcion_disc' => '',
       ]);
        DB::table('disciplinas')->insert([
             'categoria' => 1,
             'tipo' => 0,
            'nombre_disc' => 'futbol',
            'foto_disc' => 'sin_imagen.png',
            'reglamento_disc' => '',
            'descripcion_disc' => '',
        ]);
        DB::table('disciplinas')->insert([
            'categoria' => 2,
            'tipo' => 0,
           'nombre_disc' => 'futbol',
           'foto_disc' => 'sin_imagen.png',
           'reglamento_disc' => '',
           'descripcion_disc' => '',
       ]);
       DB::table('disciplinas')->insert([
        'categoria' => 0,
        'tipo' => 0,
       'nombre_disc' => 'basketbol',
       'foto_disc' => 'sin_imagen.png',
       'reglamento_disc' => '',
       'descripcion_disc' => '',
   ]);
    DB::table('disciplinas')->insert([
         'categoria' => 1,
         'tipo' => 0,
        'nombre_disc' => 'basketbol',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '',
    ]);
       DB::table('disciplinas')->insert([
        'categoria' => 2,
        'tipo' => 0,
       'nombre_disc' => 'basketbol',
       'foto_disc' => 'sin_imagen.png',
       'reglamento_disc' => '',
       'descripcion_disc' => '',
        ]);

        DB::table('tipos')->insert([
            'nombre_tipo'=>'series'
        ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'eliminacion'
        ]);
    }
}
