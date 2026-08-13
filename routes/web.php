<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnimalCategoryController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalGradeController;
use App\Http\Controllers\CageController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalReportController;

use App\Models\Animal;
use App\Models\Announcement;
use App\Models\Package;
use App\Models\Cage;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [WebsiteController::class, 'index'])
    ->name('website.home');

Route::get('/about', [WebsiteController::class, 'profile'])
    ->name('website.profile');

Route::get('/packages', [WebsiteController::class, 'packages'])
    ->name('website.packages');

Route::get('/packages/{package}', [WebsiteController::class, 'packageDetail'])
    ->name('website.package.detail');

Route::get('/animals', [WebsiteController::class, 'animals'])
    ->name('website.animals');

Route::get(
    '/animals/{animal_code}',
    [WebsiteController::class, 'animalDetail']
)->name('website.animal.detail');

Route::get(
    '/cages/{cage_code}',
    [WebsiteController::class, 'cageDetail']
)->name('website.cage.detail');

Route::get('/announcements', [WebsiteController::class, 'announcements'])
    ->name('website.announcements');

Route::get('/announcements/{announcement}', [WebsiteController::class, 'announcementDetail'])
    ->name('website.announcement.detail');

Route::get('/contact', [WebsiteController::class, 'contact'])
    ->name('website.contact');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {

        return view('dashboard', [

            'animals'       => Animal::count(),
            'announcements' => Announcement::count(),
            'packages'      => Package::count(),
            'totalCages'    => Cage::count(),
            'users'         => User::count(),

            'cages' => Cage::withCount('animals')
                ->orderByRaw('CAST(SUBSTRING_INDEX(name," ",-1) AS UNSIGNED)')
                ->get(),

        ]);

    })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/notifications/read', [ActivityLogController::class, 'markAsRead'])
        ->name('notifications.read');

});

/*
|--------------------------------------------------------------------------
| OWNER PAGE
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:Owner'
])->group(function () {

    Route::get('/owner', function () {

        return view('owner');

    });

});


/*
|--------------------------------------------------------------------------
| DASHBOARD CRUD
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')
    ->middleware('auth')
    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Announcement
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner|Admin')->group(function () {

        Route::resource(
            'announcements',
            AnnouncementController::class
        );

    });

    /*
    |--------------------------------------------------------------------------
    | Animal Category
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner')->group(function () {

        Route::resource(
            'animal-categories',
            AnimalCategoryController::class
        );

    });

    /*
    |--------------------------------------------------------------------------
    | Animal Grade
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner')->group(function () {

        Route::resource(
            'animal-grades',
            AnimalGradeController::class
        );

    });

    /*
    |--------------------------------------------------------------------------
    | Cage
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner')->group(function () {

        Route::resource(
            'cages',
            CageController::class
        );

        Route::get(
            'cages/{cage}/download-qr',
            [CageController::class, 'downloadQr']
        )->name('cages.download.qr');

    });

    /*
    |--------------------------------------------------------------------------
    | Package
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner')->group(function () {

        Route::resource(
            'packages',
            PackageController::class
        );

        Route::get(
            'packages/{package}/prices',
            [PriceController::class, 'packagePrices']
        )->name('packages.prices');

        Route::get(
            'packages/{package}/prices/create',
            [PriceController::class, 'create']
        )->name('packages.prices.create');

        Route::post(
            'packages/{package}/prices',
            [PriceController::class, 'store']
        )->name('packages.prices.store');

        Route::get(
            'prices/{price}/edit',
            [PriceController::class, 'edit']
        )->name('prices.edit');

        Route::put(
            'prices/{price}',
            [PriceController::class, 'update']
        )->name('prices.update');

        Route::delete(
            'prices/{price}',
            [PriceController::class, 'destroy']
        )->name('prices.destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | Animal
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner|Admin|Penjaga Kandang')->group(function () {

        Route::resource(
            'animals',
            AnimalController::class
        );

        Route::get(
            'animals/{animal}/detail',
            [AnimalController::class, 'detail']
        )->name('animals.detail');

        // QR Code Hewan
        Route::get(
            '/animals/{animal}/qrcode',
            [AnimalController::class, 'qrcode']
        )->name('animals.qrcode');

        Route::get(
            'animals/{animal}/download-qr',
            [AnimalController::class, 'downloadQr']
        )->name('animals.download.qr');

    });

    /*
    |--------------------------------------------------------------------------
    | Laporan Data Hewan
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner|Admin')->group(function () {

        Route::get(
            'animal-reports',
            [AnimalReportController::class, 'index']
        )->name('animal-reports.index');

    });

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Owner')->group(function () {

        Route::resource(
            'users',
            UserController::class
        );

    });

});

require __DIR__.'/auth.php';