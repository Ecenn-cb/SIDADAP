<?php

namespace Database\Seeders;

use App\Models\Cage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cage::create([
            'name' => 'Kandang A',
            'user_id' => 1,
            'created_at' => now()
        ]);
    }
}
