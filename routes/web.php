<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalCategoryController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalGradeController;
use App\Http\Controllers\CageController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use App\Models\Animal;
use App\Models\Announcement;
use App\Models\Package;
use App\Models\Cage;
use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:Owner')->group(function (){
    Route::get('/owner', function (){
        return view('owner');
    });
});

// CRUD Announcement
Route::middleware(['auth','role:Owner|Admin'])->group(function () {
    Route::resource('announcements', AnnouncementController::class);
});

// CRUD Category
Route::middleware(['auth','role:Owner'])->group(function () {
    Route::resource('animal-categories',AnimalCategoryController::class);
});

// CRUD Grade
Route::middleware(['auth','role:Owner'])->group(function () {
    Route::resource('animal-grades',AnimalGradeController::class);
});

// CRUD Cages
Route::middleware(['auth','role:Owner'])->group(function () {
    Route::resource('cages',CageController::class);
});

// CRUD Packages & Harga
Route::middleware([
    'auth',
    'role:Owner'
])->group(function () {

    // CRUD Package
    Route::resource('packages', PackageController::class);

    // Daftar harga per paket
    Route::get(
        '/packages/{package}/prices',
        [PriceController::class, 'packagePrices']
    )->name('packages.prices');

    // Form tambah harga
    Route::get(
        '/packages/{package}/prices/create',
        [PriceController::class, 'create']
    )->name('packages.prices.create');

    // Simpan harga
    Route::post(
        '/packages/{package}/prices',
        [PriceController::class, 'store']
    )->name('packages.prices.store');

    // Edit harga
    Route::get(
        '/prices/{price}/edit',
        [PriceController::class, 'edit']
    )->name('prices.edit');

    // Update harga
    Route::put(
        '/prices/{price}',
        [PriceController::class, 'update']
    )->name('prices.update');

    // Hapus harga
    Route::delete(
        '/prices/{price}',
        [PriceController::class, 'destroy']
    )->name('prices.destroy');
});

// CRUD Animals
Route::middleware(['auth','role:Owner|Admin|Penjaga Kandang'])->group(function () {
    Route::resource('animals',AnimalController::class);
});

// CRUD User (For Owner)
Route::middleware(['auth','role:Owner'])->group(function () {
    Route::resource('users', UserController::class);
});

// Dashboard Route
Route::get('/dashboard', function () {

    return view('dashboard', [
        'animals'       => Animal::count(),
        'announcements' => Announcement::count(),
        'packages'      => Package::count(),
        'totalCages'    => Cage::count(),
        'users'         => User::count(),

        'cages' => Cage::withCount('animals')
            ->orderByRaw('CAST(SUBSTRING_INDEX(name, " ", -1) AS UNSIGNED)')
            ->get(),
    ]);

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
