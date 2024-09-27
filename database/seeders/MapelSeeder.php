<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Mapel::create([
            'nama_mapel' => 'Kimia' ,
            'user_id' => '1',
            'cp' => 'Capaian.pdf' ,
            'atp' => 'Alur_Tujuan.pdf' ,
            'ma' => 'Modul_Ajar.pdf' ,
            'prosem' => 'Program_Semester.pdf' ,
            'prota' => 'program_tahunan.pdf' ,
            'kktp' => 'kriteria_ketercapaian.pdf' ,
            'bba' => 'buku_bahan_ajar.pdf' ,
            'bonus' => 'bonus.pdf' ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
