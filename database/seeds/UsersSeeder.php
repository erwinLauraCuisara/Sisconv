<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrador',
                'apellidos' => 'Admin',
                'email' => 'administrador@gmail.com',
                'password' => bcrypt('admin'),
                'remember_token' => '',
            ]
        ];

        foreach ($users as $user) {
            $user = User::create($user);

            if ($user->name == 'Administrador') {
                $user->assignRole(['administrador']);
            }
        }
    }
}
