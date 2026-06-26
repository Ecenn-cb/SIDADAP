<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Animal;
use App\Models\Cage;
use App\Models\Package;

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
        View::composer('layouts.guest', function ($view) {

            $view->with([
                'totalAnimals' => Animal::count(),
                'totalCages'   => Cage::count(),
                'totalPackages'=> Package::count(),
            ]);

        });
    }
}
