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
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Mayor Real Y Pontificia De San Francisco Xavier',
            'alias_club' => 'STUMRPSFX',
            'ciudad' => 'Chuquisaca',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Mayor de San Andres',
            'alias_club' => 'STUMSA',
            'ciudad' => 'La Paz',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Mayor de San Simón',
            'alias_club' => 'STUMSS',
            'ciudad' => 'Cochabamba',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Autonoma Tomas Frias',
            'alias_club' => 'STUTF',
            
            'ciudad' => 'Potosi',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Tecnica de Oruro',
            'alias_club' => 'SINTRAUTO',
            
            'ciudad' => 'Oruro',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Autonoma Juan Misael Saracho',
            'alias_club' => 'STAJMS',
            
            'ciudad' => 'Tarija',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Autonoma Gabriel Rene Moreno',
            'alias_club' => 'STUAGRM',
            
            'ciudad' => 'Santa Cruz',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Autonoma del Beni Jose Ballivian',
            'alias_club' => 'STUAJB',
            
            'ciudad' => 'Beni',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Comite Ejecutivo Universidad Boliviana',
            'alias_club' => 'STCEUB',
            
            'ciudad' => 'Beni',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Nacional Siglo XX',
            'alias_club' => 'STSXX',
            
            'ciudad' => 'Potosi',
            'descripcion_club' => 'LLallagua',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Amazonica de Pando',
            'alias_club' => 'STUAP',
            
            'ciudad' => 'Pando',
            'descripcion_club' => '',
        ]);
        DB::table('clubs')->insert([
            'nombre_club' => 'Universidad Publica del Alto',
            'alias_club' => 'STUPEA',
            
            'ciudad' => 'La Paz',
            'descripcion_club' => 'El alto',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '1',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '2',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '3',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '4',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '5',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '6',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '7',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '8',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '9',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '10',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '11',
        ]);
        DB::table('adminclubs')->insert([
            'id_administrador' => '1',
            'id_club' => '12',
        ]);
    }
}
