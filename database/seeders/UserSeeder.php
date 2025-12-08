<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', Role::ADMIN)->first();
        $doctorRole = Role::where('name', Role::DOCTOR)->first();
        $patientRole = Role::where('name', Role::PATIENT)->first();

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'GiftMed Admin',
                'password' => Hash::make('password'),
                'role_id' => $adminRole?->id,
            ]
        );

        // Doctor
        User::updateOrCreate(
            ['email' => 'doctor@example.com'],
            [
                'name' => 'GiftMed Doctor',
                'password' => Hash::make('password'),
                'role_id' => $doctorRole?->id,
            ]
        );

        // Patient
        User::updateOrCreate(
            ['email' => 'patient@example.com'],
            [
                'name' => 'GiftMed Patient',
                'password' => Hash::make('password'),
                'role_id' => $patientRole?->id,
            ]
        );
    }
}
