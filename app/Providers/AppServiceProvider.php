<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\View;
use App\Models\Animal;
use App\Models\Cage;
use App\Models\Package;
use App\Models\ActivityLogRead;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            $notifications = ActivityLog::with('user')
                ->latest()
                ->take(20)
                ->get();

            $unreadNotifications = auth()->check()
                ? ActivityLog::whereDoesntHave('reads', function ($query) {
                    $query->where('user_id', auth()->id());
                })->count()
                : 0;

            $view->with([
                'notifications' => $notifications,
                'unreadNotifications' => $unreadNotifications,
                'totalAnimals' => Animal::count(),
                'totalCages' => Cage::count(),
                'totalPackages' => Package::count(),
            ]);

        });
    }
}