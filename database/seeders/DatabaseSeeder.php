<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            AnimalCategoriesSeeder::class,
            AnimalGradesSeeder::class,

            CagesSeeder::class,

            PackagesSeeder::class,
            PriceSeeder::class,

            AnnouncementSeeder::class,

            AnimalSeeder::class,
        ]);
    }
}
