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
            'username' => 'admin',
            'role' => '1',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'username' => 'res',
            'role' => '2',
            'password' => Hash::make('res'),
        ]);

        User::create([
            'username' => 'affaires',
            'role' => '3',
            'password' => Hash::make('affaires'),
        ]);
    }
}
