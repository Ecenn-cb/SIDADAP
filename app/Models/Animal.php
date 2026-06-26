<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_code',
        'name',

        'category_id',
        'cage_id',
        'grade_id',

        'gender',
        'weight',
        'age',

        'image',
        'qr_code',

        'entry_date',

        'status',
        'description',

        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(AnimalCategory::class, 'category_id');
    }

    public function cage()
    {
        return $this->belongsTo(Cage::class, 'cage_id');
    }

    public function grade()
    {
        return $this->belongsTo(AnimalGrade::class, 'grade_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}