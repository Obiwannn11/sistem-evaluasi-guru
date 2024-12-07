<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data guru
    Guru::table('gurus')->insert([
        ['nama' => 'Guru A'],
        ['nama' => 'Guru B']
    ]);

    // Data kriteria
    Kriteria::table('kriterias')->insert([
        ['nama' => 'Pedagogik', 'bobot' => 0.6],
        ['nama' => 'Profesional', 'bobot' => 0.4]
    ]);


    }
}
