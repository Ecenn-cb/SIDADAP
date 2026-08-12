<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::insert([

            [
                'name' => 'Paket Aqiqah Masak Saja',
                'description' => 'Menu 1 (Olahan Daging): Blackpepper, Teriyaki, Bistik, Rica-Rica, Semur. Menu 2 (Olahan Tulang): Gulai Kambing, Sop Kambing, Kari Kambing, Tongseng, Rawon Kambing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Paket Gold',
                'description' => 'ISI MENU PAKET GOLD : Nasi Putih, Olahan Daging, Olahan Tulang, Tumisan, Telur, Buah Jeruk, Fruit Tea, Kerupuk, Acar, Alat Makan (Kemasan Box Kotak).',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Paket Berkah',
                'description' => 'ISI MENU PAKET BERKAH : Nasi Putih, Olahan Daging, Olahan Tulang, Ayam Bakar, Fruit Tea, Kerupuk, Acar, Alat Makan (Kemasan Box Kotak).',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Paket Mewah',
                'description' => 'ISI MENU PAKET MEWAH : Nasi Putih, Olahan Daging, Olahan Tulang, Tumisan, Fruit Tea, Kerupuk, Acar, Alat Makan (Kemasan Box Bento).',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Paket Sunnah',
                'description' => 'ISI MENU PAKET SUNNAH : Nasi Putih, Olahan Daging, Olahan Tulang, Kerupuk, Acar, Alat Makan, dan Fruit Tea (Kemasan Box Bento).',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Paket Syukur',
                'description' => 'ISI MENU PAKET SYUKUR : Nasi Putih, Olahan Daging, Olahan Tulang, Kerupuk, Acar, dan Alat Makan (Kemasan Box Bento).',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
