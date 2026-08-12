<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cage;

class CagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cage::insert([

            [
                'cage_code' => 'KDG001',
                'name' => 'Kandang A',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'cage_code' => 'KDG002',
                'name' => 'Kandang B',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'cage_code' => 'KDG003',
                'name' => 'Kandang C',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'cage_code' => 'KDG004',
                'name' => 'Kandang D',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'cage_code' => 'KDG005',
                'name' => 'Kandang E',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}