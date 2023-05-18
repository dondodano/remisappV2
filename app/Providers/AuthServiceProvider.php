<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $this->registerPolicies();

        Gate::define('is_super', function($user){
            if(strtolower($user->user_role->term) == 'super')
            {
                return true;
            }
            return abort(404);
        });

        Gate::define('is_admin', function($user){
            if(strtolower($user->user_role->term) == 'admin')
            {
                return true;
            }
            return abort(404);
        });

        Gate::define('is_faculty', function($user){
            if(strtolower($user->user_role->term) == 'faculty')
            {
                return true;
            }
            return abort(404);
        });

        Gate::define('is_staff', function($user){
            if(strtolower($user->user_role->term) == 'staff')
            {
                return true;
            }
            return abort(404);
        });
    }
}
