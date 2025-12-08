<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', Role::ADMIN)->first();
        $doctorRole = Role::where('name', Role::DOCTOR)->first();
        $patientRole = Role::where('name', Role::PATIENT)->first();

        User::updateOrCreate(
            ['email' => 'admin@giftmed.test'],
            [
                'name' => 'GiftMed Admin',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'doctor@giftmed.test'],
            [
                'name' => 'GiftMed Doctor',
                'password' => Hash::make('password'),
                'role_id' => $doctorRole->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'patient@giftmed.test'],
            [
                'name' => 'GiftMed Patient',
                'password' => Hash::make('password'),
                'role_id' => $patientRole->id,
            ]
        );
    }
}
