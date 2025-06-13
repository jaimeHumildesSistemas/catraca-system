<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::updateOrCreate(['username' => 'admin'], ['description' => 'Administrador do sistema']);
        Role::updateOrCreate(['username' => 'operador'], ['description' => 'Usuário operador']);
        Role::updateOrCreate(['username' => 'visitante'], ['description' => 'Usuário visitante']);
    }
}
