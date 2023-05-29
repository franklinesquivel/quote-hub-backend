<?php

namespace Database\Seeders;

use App\Constants\UserTypesConstant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5)->create();

        User::create([
            'name' => 'Franklin Esquivel',
            'username' => 'frank.esquivel',
            'email' => 'franklin.esquivel@outlook.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => UserTypesConstant::ADMIN
        ]);

        User::create([
            'name' => 'Nick',
            'username' => 'nick',
            'email' => 'nick@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => UserTypesConstant::USER
        ]);
    }
}
