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
        Package::create([
           'name' => 'Paket Mewah',
           'description' => 'Paket Mewah adalah paketnya orang mewah',
        ]);

        Package::create([
           'name' => 'Paket Sunnah',
           'description' => 'Paket Sunnah adalah paket bebas pilih sesuai kebutuhan.'
        ]);
    }
}
