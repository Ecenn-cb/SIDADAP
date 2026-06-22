<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'total_animals',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class, 'cage_id');
    }
}