<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Administrador;
use App\Models\Tipo;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('administradores')->insert([
         	'ci' => 1234567,
            'nombre' => 'administrador',
            'apellidos' => 'apellidos',
            'genero' => 1,
            'fecha_nac' => '1980-04-04',
            'foto_admin' => 'usuario-sin-foto.png',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'descripcion_admin' => 'Adminsitrador del sistema',
            'tipo'=>'Administrador',
        ]);
        
         DB::table('administradores')->insert([
            'ci' => 123,
            'nombre' => 'coordinador',
            'apellidos' => 'apellidos',
            'genero' => 1,
            'fecha_nac' => '1980-04-04',
            'foto_admin' => 'usuario-sin-foto.png',
            'email'=> 'coord@gmail.com',
            'password' => bcrypt('123456'),
            'descripcion_admin' => 'coordinadorclubs',
            'tipo'=>'Coordinador',
        ]);

        DB::table('administradores')->insert([
            'ci' => 1234,
            'nombre' => 'coordinadordos',
            'apellidos' => 'apellidos',
            'genero' => 1,
            'fecha_nac' => '1980-04-04',
            'foto_admin' => 'usuario-sin-foto.png',
            'email'=> 'coord2@gmail.com',
            'password' => bcrypt('123456'),
            'descripcion_admin' => 'coordinadorclubs',
            'tipo'=>'Coordinador',
        ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'series'
        ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'eliminacion'
        ]);

        //DISCIPLINAS
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Futbol',
            'categoria'=>'2',
            'descripcion_disc'=>'Disciplina',
        ]);
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Futbol',
            'categoria'=>'1',
            'descripcion_disc'=>'Disciplina',
        ]);
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Basquet',
            'categoria'=>'1',
            'descripcion_disc'=>'Disciplina',
        ]);
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Basquet',
            'categoria'=>'2',
            'descripcion_disc'=>'Disciplina',
        ]);
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Voleibol',
            'categoria'=>'0',
            'descripcion_disc'=>'Disciplina',
        ]);
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Voleibol',
            'categoria'=>'1',
            'descripcion_disc'=>'Disciplina',
        ]);
        DB::table('disciplinas')->insert([
            'nombre_disc'=>'Voleibol',
            'categoria'=>'2',
            'descripcion_disc'=>'Disciplina',
        ]);
        
    }
}
