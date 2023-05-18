<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Custom Blade Directives
         */

        Blade::if('role', function($roles = []){
            switch(gettype($roles))
            {
                case "string":
                    if(strlen($roles) == 0){return false;}
                    return strtolower(sessionGet('role')) == strtolower( $roles);
                    break;

                case "array":
                    if(empty($roles)){return false;}

                    return in_array( strtolower(sessionGet('role')) , array_map('strtolower', $roles));
                    break;
            }

        });

        Blade::if('isOnline', function($userId){
            return Cache::get('user-' . $userId)['isOnline'] == 1;
        });

        Blade::if('isOffline', function($userId){
            return Cache::get('user-' . $userId)['isOnline'] == 0;
        });
    }
}
