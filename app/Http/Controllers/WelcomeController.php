<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Announcement;
use App\Models\Cage;
use App\Models\Package;

class WelcomeController extends Controller
{
    public function index()
    {
        $animals = Animal::with([
            'grade',
            'category',
            'cage'
        ])
        ->latest()
        ->take(12)
        ->get();

        $packages = Package::with([
            'prices'
        ])->latest()->get();

        $announcements = Announcement::where('status','Active')
        ->latest()
        ->take(3)
        ->get();

        $cages = Cage::withCount('animals')
            ->orderBy('name')
            ->get();

        $featuredAnimal = Animal::with([
            'grade',
            'category',
            'cage'
        ])
        ->whereNotNull('image')
        ->latest()
        ->first();

        return view('welcome', compact(
            'animals',
            'packages',
            'announcements',
            'cages',
            'featuredAnimal'
        ));
    }
}