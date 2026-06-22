<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalCategory extends Model
{
    use HasFactory;

    protected $table = 'animal_categories';

    protected $fillable = [
        'name',
        'description',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'category_id');
    }
}