<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalCategoryController;
use App\Http\Controllers\AnimalGradeController;
use App\Http\Controllers\CageController;

Route::get('/', [HomeController::class, 'index']);

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

require __DIR__.'/auth.php';
