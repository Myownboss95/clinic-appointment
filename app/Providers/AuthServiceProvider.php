<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerGates();

        //
    }
    private function registerGates()
    {
        Gate::define('is_admin', fn (User $user) => $user->role_id == 3);
        Gate::define('is_staff', fn (User $user) => $user->role_id == 2 || $user->role_id == 3);
        Gate::define('is_user', fn (User $user) => $user->role_id == 1);
    }
}
