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
            'categoria' => 2,
            'sub_categoria' => 2,
            'tipo' => 0,
           'nombre_disc' => 'Futbol',
           'foto_disc' => 'sin_imagen.png',
           'reglamento_disc' => '',
           'descripcion_disc' => 'En cancha 4 senior y 7 libre durante todo el partido. 18 jugadores máximo,11 mínimo.',
       ]);
        DB::table('disciplinas')->insert([
            'categoria' => 2,
            'sub_categoria' => 2,
            'tipo' => 0,
            'nombre_disc' => 'Futbol de Salón',
            'foto_disc' => 'sin_imagen.png',
            'reglamento_disc' => '',
            'descripcion_disc' => 'En cancha 2 senior y 3 libre durante todo el partido. 10 jugadores máximo,5 mínimo.',
        ]);
       DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 2,
        'tipo' => 0,
       'nombre_disc' => 'Basket',
       'foto_disc' => 'sin_imagen.png',
       'reglamento_disc' => '',
       'descripcion_disc' => 'En cancha 2 senior y 3 libre durante todo el partido. 10 jugadores máximo,5 mínimo.',
   ]);
    DB::table('disciplinas')->insert([
         'categoria' => 1,
        'sub_categoria' => 2,
        'tipo' => 0,
        'nombre_disc' => 'Basket',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => 'En cancha 2 senior y 3 libre durante todo el partido. 10 jugadores máximo,5 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 2,
        'tipo' => 0,
       'nombre_disc' => 'Voleibol',
       'foto_disc' => 'sin_imagen.png',
       'reglamento_disc' => '',
       'descripcion_disc' => 'En cancha 3 senior y 3 libre durante todo el partido. 10 jugadores máximo,6 mínimo.',
    ]);
        DB::table('disciplinas')->insert([
            'categoria' => 1,
        'sub_categoria' => 2,
        'tipo' => 0,
        'nombre_disc' => 'Voleibol',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => 'En cancha 3 senior y 3 libre durante todo el partido. 10 jugadores máximo,6 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 2,
        'tipo' => 0,
       'nombre_disc' => 'Wally',
       'foto_disc' => 'sin_imagen.png',
       'reglamento_disc' => '',
       'descripcion_disc' => 'En cancha 2 senior y 2 libre durante todo el partido. 6 jugadores máximo,4 mínimo.',
    ]);
        DB::table('disciplinas')->insert([
            'categoria' => 1,
        'sub_categoria' => 2,
        'tipo' => 0,
        'nombre_disc' => 'Wally',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => 'En cancha 2 senior y 2 libre durante todo el partido. 6 jugadores máximo,4 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 2,
        'tipo' => 0,
       'nombre_disc' => 'Raqueta Frontón en pareja',
       'foto_disc' => 'sin_imagen.png',
       'reglamento_disc' => '',
       'descripcion_disc' => 'En cancha 1 senior y 1 libre durante todo el partido. 4 jugadores máximo,2 mínimo.',
    ]);
        DB::table('disciplinas')->insert([
            'categoria' => 1,
        'sub_categoria' => 2,
        'tipo' => 0,
        'nombre_disc' => 'Raqueta Frontón en pareja',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => 'En cancha 1 senior y 1 libre durante todo el partido. 4 jugadores máximo,2 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Maraton 5000 metros',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Maraton 10000 metros',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => '100 metros planos',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => '100 metros planos',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);

    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Natación 100 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Natación 100 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Natación 400 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Natación 400 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Tenis de mesa',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Tenis de mesa',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Raquet',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 1,
        'tipo' => 1,
        'nombre_disc' => 'Raquet',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Maraton 3000 metros',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Maraton 5000 metros',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => '100 metros planos',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => '100 metros planos',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 atletas máximo,1 mínimo.',
    ]);

    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Natación 100 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Natación 100 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Natación 400 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Natación 400 metros libres',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 nadadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Raquet',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 0,
        'tipo' => 1,
        'nombre_disc' => 'Raquet',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 1,
        'sub_categoria' => 3,
        'tipo' => 1,
        'nombre_disc' => 'Ajedrez',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
    DB::table('disciplinas')->insert([
        'categoria' => 2,
        'sub_categoria' => 3,
        'tipo' => 1,
        'nombre_disc' => 'Ajedrez',
        'foto_disc' => 'sin_imagen.png',
        'reglamento_disc' => '',
        'descripcion_disc' => '2 jugadores máximo,1 mínimo.',
    ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'series'
        ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'eliminacion'
        ]);
    }
}
