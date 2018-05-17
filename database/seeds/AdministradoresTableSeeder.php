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
            'genero' => 'masculino',
            'fecha_nac' => '1980-04-04',
            'foto_admin' => 'usuario-sin-foto.png',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'descripcion_admin' => 'Adminsitrador del sistema',
            'tipo'=>'Administrador'
            
        ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'series'
        ]);
        DB::table('tipos')->insert([
            'nombre_tipo'=>'eliminacion'
        ]);
    }
}
