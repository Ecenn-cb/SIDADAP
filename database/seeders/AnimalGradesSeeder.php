<?php

namespace Database\Seeders;

use App\Models\AnimalGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnimalGrade::create([
            'name' => 'Merah',
            'description' => '5kg - 10kg'
        ]);
    }
}
