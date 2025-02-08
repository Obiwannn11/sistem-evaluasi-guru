<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nama' => 'Supriadi',
            'nip' => '0192832',
            'email' => 'supriadi@smk.id',
            'telepon' => '0812398212',
            'is_admin' => true,
            'password' => Hash::make('password'),
        ]);

        Guru::create([
            'nama' => 'Mustikasari',
            'nip' => '0192832',
            'email' => 'mustika@smk.id',
            'telepon' => '0812398212',
            'is_admin' => false,
            'password' => Hash::make('password'),
        ]);

        // Membuat user Admin (is_admin = true)
        DB::table('gurus')->insert([
            'nama' => 'Admin Guru',
            'nip' => '1234567890123456', // Contoh NIP, bisa diganti
            'email' => 'admin@example.com', // Contoh email, bisa diganti
            'telepon' => '081234567890', // Contoh telepon, bisa diganti atau dihapus jika tidak perlu
            'password' => Hash::make('password'), // Password di-hash, meskipun hanya untuk seeder
            'is_admin' => true, // Set is_admin menjadi true untuk user admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Membuat user Guru biasa (is_admin = false)
        DB::table('gurus')->insert([
            'nama' => 'Guru Biasa',
            'nip' => '0987654321098765', // Contoh NIP, bisa diganti
            'email' => 'guru@example.com', // Contoh email, bisa diganti
            'telepon' => '089876543210', // Contoh telepon, bisa diganti atau dihapus jika tidak perlu
            'password' => Hash::make('password'), // Password di-hash, meskipun hanya untuk seeder
            'is_admin' => false, // Set is_admin menjadi false untuk user guru biasa
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    }

