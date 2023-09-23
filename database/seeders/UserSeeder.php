<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'aslam',
            'email' => 'hello@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'techpos',
            'email' => 'techpos@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
    }
}
