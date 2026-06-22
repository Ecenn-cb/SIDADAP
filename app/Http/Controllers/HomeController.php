<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where(
            'status',
            'active'
        )
        ->latest()
        ->get();

        return view(
            'welcome',
            compact('announcements')
        );
    }
}