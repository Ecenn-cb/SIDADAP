<?php

namespace Database\Seeders;

use App\Models\AnimalDescription;
use Illuminate\Database\Seeder;

class AnimalDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnimalDescription::create([
            'description' => 'Kambing sehat, aktif, nafsu makan baik, dan cocok untuk paket aqiqah reguler.'
        ]);

        AnimalDescription::create([
            'description' => 'Kambing jantan dengan kondisi prima, bobot ideal, dan siap untuk paket aqiqah premium.'
        ]);

        AnimalDescription::create([
            'description' => 'Kambing betina sehat dengan perawatan rutin dan kualitas daging yang baik.'
        ]);

        AnimalDescription::create([
            'description' => 'Kambing pilihan dengan tubuh besar, sehat, dan memenuhi syarat hewan aqiqah.'
        ]);

        AnimalDescription::create([
            'description' => 'Kambing berkualitas tinggi yang telah melalui pemeriksaan kesehatan secara berkala.'
        ]);
    }
}