<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLogRead extends Model
{
    protected $fillable = [
        'activity_log_id',
        'user_id',
    ];

    public function activityLog()
    {
        return $this->belongsTo(ActivityLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}