<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalDescription extends Model
{
    use HasFactory;

    protected $table = 'animal_descriptions';

    protected $fillable = [
        'description',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'description_id');
    }
}