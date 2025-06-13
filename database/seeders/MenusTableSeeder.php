<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        Menu::updateOrCreate(['name' => 'Dashboard'], ['route' => 'dashboard', 'icon' => 'fas fa-tachometer-alt']);
        Menu::updateOrCreate(['name' => 'Usuários'], ['route' => 'users.index', 'icon' => 'fas fa-users']);
        Menu::updateOrCreate(['name' => 'Configurações'], ['route' => 'settings.index', 'icon' => 'fas fa-cogs']);
    }
}
