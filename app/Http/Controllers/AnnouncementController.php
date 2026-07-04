<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Helpers\ActivityLogger;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view(
            'announcements.index',
            compact('announcements')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        $image = $request->file('image')
            ->store('announcements', 'public');

        $announcement = Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);

        ActivityLogger::log(
            'Announcement',
            'Create',
            'Menambahkan announcement "' . $announcement->title . '"'
        );

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view(
            'announcements.show',
            compact('announcement')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view(
            'announcements.edit',
            compact('announcement')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateAnnouncementRequest $request,
        Announcement $announcement
    )
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {

            if ($announcement->image) {
                Storage::disk('public')
                    ->delete($announcement->image);
            }

            $data['image'] = $request->file('image')
                ->store('announcements', 'public');
        }

        $announcement->update($data);

        ActivityLogger::log(
            'Announcement',
            'Update',
            'Mengubah announcement "' . $announcement->title . '"'
        );

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        if ($announcement->image) {
            Storage::disk('public')
                ->delete($announcement->image);
        }

        $announcementTitle = $announcement->title;
        $announcement->delete();

        ActivityLogger::log(
            'Announcement',
            'Delete',
            'Menghapus announcement "' . $announcementTitle . '"'
        );

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}