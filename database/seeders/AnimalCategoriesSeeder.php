<?php

namespace Database\Seeders;

use App\Models\AnimalCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnimalCategory::create([
            'name' => 'Kambing',
            'description' => 'Ini Kambing'
        ]);
    }
}
