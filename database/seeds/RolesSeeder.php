<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'administrador',
            ],
            [
                'name' => 'receptor',
            ],
            [
                'name' => 'evaluador',
            ],
            [
                'name' => 'postulante',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
