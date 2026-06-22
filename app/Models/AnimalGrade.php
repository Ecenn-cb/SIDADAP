<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalGrade extends Model
{
    use HasFactory;

    protected $table = 'animal_grades';

    protected $fillable = [
        'name',
        'description',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'grade_id');
    }
}