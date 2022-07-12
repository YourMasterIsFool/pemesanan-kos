<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->roles[0]->role === 'Admin';
        });
        
        Gate::define('pemilik', function (User $user) {
            return $user->roles[0]->role === 'Pemilik';
        });

        Gate::define('penyewa', function (User $user) {
            return $user->roles[0]->role === 'Penyewa';
        });
    }
}
