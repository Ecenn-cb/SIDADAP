<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Announcement;
use App\Models\Package;

class WebsiteController extends Controller
{
    public function index()
    {
        $highlightAnnouncement = Announcement::where('status', 'Active')
        ->latest()
        ->first();

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

    public function animals()
    {
        $animals = Animal::with([
            'category',
            'grade',
            'cage'
        ])->latest()->get();

        return view(
            'website.animals',
            compact('animals')
        );
    }

    public function animalDetail(Animal $animal)
    {
        $animal->load([
            'category',
            'grade',
            'cage'
        ]);

        return view(
            'website.animal-detail',
            compact('animal')
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