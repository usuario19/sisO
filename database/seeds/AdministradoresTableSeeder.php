<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nombre' => 'admin',
            'apellidos' => 'apellidos',
            'genero' => 'masculino',
            'fecha_nac' => '04/04/1980',
            'foto_admin' => 'foto',
            'email'=> 'admin@gmail.com',
            'password' => '123456',
            'descripcion_admin' => 'Adminsitrador del sistema',
            
        ]);
    }
}
