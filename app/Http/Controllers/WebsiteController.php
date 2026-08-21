<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Announcement;
use App\Models\Package;
use App\Models\Cage;
use Illuminate\Http\Request;
use App\Models\AnimalGrade;

class WebsiteController extends Controller
{
    public function index()
    {
        $highlightAnnouncement = Announcement::where('status', 'Active')
            ->latest()
            ->first();

        // Berita lainnya (selain berita utama)
        $otherAnnouncements = Announcement::where('status', 'Active')
            ->when($highlightAnnouncement, function ($query) use ($highlightAnnouncement) {
                $query->where('id', '!=', $highlightAnnouncement->id);
            })
            ->latest()
            ->take(3)
            ->get();

        $packages = Package::latest()
            ->take(3)
            ->get();

        $animals = Animal::with([
            'grade',
            'category',
            'cage'
        ])
        ->latest()
        ->take(6)
        ->get();

        return view('website.home', compact(
            'highlightAnnouncement',
            'otherAnnouncements',
            'packages',
            'animals'
        ));
    }

    public function profile()
    {
        return view('website.profile');
    }

    public function packages()
    {
        $packages = Package::with('prices')
            ->latest()
            ->get();

        return view(
            'website.packages',
            compact('packages')
        );
    }

    public function packageDetail(Package $package)
    {
        $package->load('prices');

        return view(
            'website.package-detail',
            compact('package')
        );
    }

    public function animals(Request $request)
    {
        $animals = Animal::with([
            'category',
            'grade',
            'cage'
        ]);

        // Filter berdasarkan grade
        if ($request->filled('grade')) {
            $animals->where('grade_id', $request->grade);
        }

        $animals = $animals->latest()->get();

        $grades = AnimalGrade::orderBy('name')->get();

        return view(
            'website.animals',
            compact(
                'animals',
                'grades'
            )
        );
    }

    public function animalDetail($animal_code)
    {
        $animal = Animal::with([
            'category',
            'grade',
            'cage'
        ])->where('animal_code', $animal_code)
        ->firstOrFail();

        return view(
            'website.animal-detail',
            compact('animal')
        );
    }

    public function cageDetail($cage_code)
    {
        $cage = Cage::with([
            'animals.category',
            'animals.grade',
            'animals.cage'
        ])
        ->where('cage_code', $cage_code)
        ->firstOrFail();

        return view(
            'website.cage-detail',
            [
                'cage' => $cage,
                'animals' => $cage->animals
            ]
        );
    }

    public function announcements()
    {
        $featuredAnnouncement = Announcement::where('status', 'Active')
            ->latest()
            ->first();

        $announcements = Announcement::where('status', 'Active')
            ->latest()
            ->paginate(6);

        return view(
            'website.announcements',
            compact(
                'featuredAnnouncement',
                'announcements'
            )
        );
    }

    public function announcementDetail($id)
    {
        $announcement = Announcement::where('status', 'Active')
            ->findOrFail($id);

        $latestAnnouncements = Announcement::where('status', 'Active')
            ->where('id', '!=', $announcement->id)
            ->latest()
            ->take(4)
            ->get();

        return view(
            'website.announcement-detail',
            compact(
                'announcement',
                'latestAnnouncements'
            )
        );
    }

    public function contact()
    {
        return view('website.contact');
    }
}