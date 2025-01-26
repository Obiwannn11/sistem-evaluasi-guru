<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Guru::create([
        //     'nama' => 'Mustikasari',
        //     'nip' => '0192832',
        //     'email' => 'admin@smk.id',
        //     'telepon' => '0812398212',
        //     'is_admin' => true,
        //     'password' => Hash::make('password'),
        // ]);

        // User::create([
        //     'name' => 'RizkaMalyah',
        //     'email' => 'rizka@smk.id',
        //     'password' => Hash::make('password'),
        // ]);

        // User::create([
        //     'name' => 'RizkaMalyah',
        //     'email' => 'rizka@smk.id',
        //     'password' => Hash::make('password'),
        // ]);

    }
}
