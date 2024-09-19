<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mustikasari',
            'email' => 'admin@smkmadani.ac.id',
            'password' => bcrypt('password'),
            'role' => 'superguru', // Atau 'superguru'
            'foto' => 'noprofil.png'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin123@smkmadani.ac.id',
            'password' => bcrypt('admin123'),
            'role' => 'superguru', // Atau 'superguru'
            'foto' => 'noprofil.png'
        ]);
    }
}
