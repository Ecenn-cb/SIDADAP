<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'title' => 'Promo Grooming',
            'description' => 'Diskon grooming 20% untuk semua kucing.',
            'image' => 'promo-grooming.jpg',
            'status' => 'active',
            'user_id' => 1,
        ]);

        Announcement::create([
            'title' => 'Paket Vaksin Baru',
            'description' => 'Kini tersedia paket vaksin lengkap.',
            'image' => 'vaksin.jpg',
            'status' => 'active',
            'user_id' => 1,
        ]);

        Announcement::create([
            'title' => 'Libur Nasional',
            'description' => 'Klinik tutup pada tanggal 17 Agustus.',
            'image' => 'libur.jpg',
            'status' => 'inactive',
            'user_id' => 1,
        ]);
    }
}
