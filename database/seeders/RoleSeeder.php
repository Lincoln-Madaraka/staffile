<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::updateOrCreate(['name' => Role::ADMIN]);
        Role::updateOrCreate(['name' => Role::DOCTOR]);
        Role::updateOrCreate(['name' => Role::PATIENT]);
    }
}
