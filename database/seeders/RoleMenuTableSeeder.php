<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Menu;

class RoleMenuTableSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::where('username', 'admin')->first();
        $operador = Role::where('username', 'operador')->first();
        $visitante = Role::where('username', 'visitante')->first();

        $dashboard = Menu::where('username', 'Dashboard')->first();
        $usuarios = Menu::where('username', 'Usuários')->first();
        $configuracoes = Menu::where('username', 'Configurações')->first();

        // Admin vê todos os menus
        $admin->menus()->sync([$dashboard->id, $usuarios->id, $configuracoes->id]);

        // Operador só vê Dashboard e Usuários, por exemplo
        $operador->menus()->sync([$dashboard->id, $usuarios->id]);

        // Visitante só vê Dashboard
        $visitante->menus()->sync([$dashboard->id]);
    }
}
