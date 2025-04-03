<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'moderator',
            'email' => 'moderator@mail.ru',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);
    }
}
