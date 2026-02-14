<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Роли пользователей */
        Role::insert([
            ['name' => 'Адинистратор', 'code' => 'admin'],
            ['name' => 'Пользователь', 'code' => 'user'],
        ]);

        /* Создание админа */
        $adminEmail = 'zamelane@vk.com';
        $adminPassword = Str::random(12);

        User::factory()->create([
            'name' => 'Admin',
            'email' => $adminEmail,
            'password' => $adminPassword,
            'role' => Role::where('code', 'admin')->first()->id
        ]);

        $this->command->table(
            ['Login', 'Password'],
            [
                [$adminEmail, $adminPassword],
            ]
        );
    }
}
