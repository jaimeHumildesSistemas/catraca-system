<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 1 usuário de teste usando factory
        User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Executa os outros seeders para popular tabelas específicas
        $this->call([
            RolesTableSeeder::class,
            MenusTableSeeder::class,
            RoleMenuTableSeeder::class,
        ]);
    }
}
