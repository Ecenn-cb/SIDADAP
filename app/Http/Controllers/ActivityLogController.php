<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ActivityLogRead;

class ActivityLogController extends Controller
{
    public function markAsRead()
    {
        $activities = ActivityLog::latest()
            ->take(8)
            ->get();

        foreach ($activities as $activity) {

            ActivityLogRead::firstOrCreate([
                'activity_log_id' => $activity->id,
                'user_id' => auth()->id(),
            ]);

        }

        return response()->json([
            'success' => true
        ]);
    }
}