<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'              => 'Admin PUSC',
            'email'             => 'admin@pusc.com',
            'password'          => Hash::make('admin123'),
            'role'              => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name'              => 'Regular User',
            'email'             => 'user@pusc.com',
            'password'          => Hash::make('user123'),
            'role'              => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
