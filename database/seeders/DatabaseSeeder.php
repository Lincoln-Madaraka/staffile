<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Only create the default admin if it doesn't already exist
        User::updateOrCreate(
            ['email' => 'test@example.com'], // find by email
            [
                'name' => 'Demo Admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: 'password'
                'email_verified_at' => now(),
                'role_id' => 1
            ]
        );
    }
}