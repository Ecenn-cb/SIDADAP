<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Animal::create([
            'category_id' => 1,
            'cage_id' => 1,
            'grade_id' => 1,
            'gender' => 'Male',
            'weight' => 7,
            'age' => 2,
            'image' => 'kambing1.jpg',
            'description_id' => 1,
            'user_id' => 1,
        ]);
    }
}
