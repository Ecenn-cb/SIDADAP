<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'package_id' => 1,
            'box_count' => 50,
            'female_price' => 50000,
            'male_price' => 60000,
        ]);
    }
}
