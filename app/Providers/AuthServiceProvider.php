<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        // Admins pass everything.
        Gate::before(function (User $user) {
            $roleName = $user->role?->name;

            if ($roleName === Role::ADMIN) {
                return true;
            }

            return null;
        });

        // Used by /admin group
        Gate::define('admin-login', function (User $user) {
            return $user->role?->name === Role::ADMIN;
        });

        Gate::define('admin-only', function (User $user) {
            return $user->role?->name === Role::ADMIN;
        });

        Gate::define('doctor-only', function (User $user) {
            return $user->role?->name === Role::DOCTOR;
        });

        Gate::define('patient-only', function (User $user) {
            return $user->role?->name === Role::PATIENT;
        });
    }
}
