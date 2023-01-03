<?php

namespace App\Providers;

use App\Models\InfeksiSaluranKemih;
use App\Models\Phlebitis;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::after(function ($user, $ability) {
            if ($user->hasRole('superadmin')) {
                return true;
            }
        });

        Relation::morphMap([
            'infeksi_saluran_kemih' => InfeksiSaluranKemih::class,
            'phlebitis' => Phlebitis::class
        ]);
    }
}
