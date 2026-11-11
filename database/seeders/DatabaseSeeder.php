<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Administrator account used for checking (login with username OR email)
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@nursery.test',
            'password' => Hash::make('password123'),
        ]);
    }
}