<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /**
         * Super-clean GiftMed rule:
         * Admins can pass any gate.
         */
        Gate::before(function (User $user) {
            $roleName = $user->role?->name;

            if ($roleName === Role::ADMIN) {
                return true;
            }

            return null;
        });

        /**
         * Used on /admin route group.
         * For GiftMed, this should be ADMIN-only.
         */
        Gate::define('admin-login', function (User $user) {
            return $user->role?->name === Role::ADMIN;
        });

        /**
         * "admin-only" stays strict.
         */
        Gate::define('admin-only', function (User $user) {
            return $user->role?->name === Role::ADMIN;
        });
    }
}
