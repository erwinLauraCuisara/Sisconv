<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' =>'usuario',
            'apellidos'=>'sisconv',
            'telefono'=>'412341',
            'celular'=>'78978978',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('123456'),
            'profesion'=>'estudiante',
        ]);
        DB::table('admins')->insert([
            'nombre' =>'admin',
            'apellidos'=>'sisconv',
            'email' => 'admin@gmail.com',
            'telefono'=>'412312',
            'departamento'=>'laboratorios',
            'password' => bcrypt('123456'),
        ]);
    }
}
