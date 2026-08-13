<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalExitLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'animal_code',
        'name',
        'category_id',
        'cage_id',
        'grade_id',
        'entry_date',
        'exit_date',
        'reason',
        'user_id',
    ];

    protected $casts = [
        'entry_date' => 'date',
        'exit_date' => 'date',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function category()
    {
        return $this->belongsTo(
            AnimalCategory::class,
            'category_id'
        );
    }

    public function cage()
    {
        return $this->belongsTo(
            Cage::class,
            'cage_id'
        );
    }

    public function grade()
    {
        return $this->belongsTo(
            AnimalGrade::class,
            'grade_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }
}