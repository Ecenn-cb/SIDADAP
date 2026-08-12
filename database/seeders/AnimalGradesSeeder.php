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
        AnimalGrade::insert([

            [
                'name' => 'BIRU',
                'description' => 'Seperti Grade Kuning (Jantan)',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'KUNING',
                'description' => 'Berat 27 - 30 KG',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'MERAH',
                'description' => 'Berat 16 - 25 KG',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'HIJAU',
                'description' => 'Berat 10 - 15 KG',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
