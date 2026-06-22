<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'Melsen Candika Bagaskara',
            'username' => 'melsencb',
            'password' => Hash::make('password'),
            'email' => 'bagaskaramelsen@gmail.com'
        ])->assignRole('Owner');

        User::create([
            'full_name' => 'Asta Blackies',
            'username' => 'asta',
            'password' => Hash::make('password'),
            'email' => 'asta@gmail.com'
        ])->assignRole('Admin');

        User::create([
            'full_name' => 'Yuno Hoki',
            'username' => 'yuno',
            'password' => Hash::make('password'),
            'email' => 'yuno@gmail.com'
        ])->assignRole('Penjaga Kandang');
    }
}
