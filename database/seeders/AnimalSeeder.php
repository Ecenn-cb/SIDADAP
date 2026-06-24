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
            'animal_code' => 'KMB001',
            'name' => 'Si Putih',

            'category_id' => 1,
            'cage_id' => 1,
            'grade_id' => 1,

            'gender' => 'Male',
            'weight' => 7,
            'age' => 2,

            'image' => 'kambing1.jpg',
            'qr_code'=> 'qrcodes/KMB001.png',

            'entry_date' => '2026-06-24',

            'status' => 'available',

            'description' => 'Kambing sehat, aktif, dan cocok untuk aqiqah.',
            'user_id' => 1,
        ]);
    }
}
