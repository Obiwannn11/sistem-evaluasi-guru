<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama kriteria
            $table->enum('tipe', ['ordinal', 'numerik', 'persentase']); // Tipe nilai
            $table->decimal('max_nilai', 8, 2); // Nilai maksimum kriteria
            $table->decimal('bobot', 5, 2); // Bobot kriteria
            $table->timestamps();
        });

        // Insert predefined kriteria
        DB::table('kriterias')->insert([
            ['nama' => 'Kalender Pendidikan', 'tipe' => 'ordinal', 'max_nilai' => '2'],
            ['nama' => 'Program Tahunan', 'tipe' => 'ordinal', 'max_nilai' => '2'],
            ['nama' => 'Program Semester', 'tipe' => 'ordinal', 'max_nilai' => '2'],
            ['nama' => 'Silabus', 'tipe' => 'ordinal', 'max_nilai' => '3'],
            ['nama' => 'Rencana Pelaksanaan Pembelajaran', 'tipe' => 'ordinal', 'max_nilai' => '3'],
            ['nama' => 'Jadwal Tatap Muka', 'tipe' => 'ordinal', 'max_nilai' => '1'],
            ['nama' => 'Agenda Harian', 'tipe' => 'ordinal', 'max_nilai' => '2'],
            ['nama' => 'Daftar Nilai', 'tipe' => 'numerik', 'max_nilai' => '100'],
            ['nama' => 'Kriteria Ketuntasan Minimal', 'tipe' => 'numerik', 'max_nilai' => '100'],
            ['nama' => 'Absen Siswa', 'tipe' => 'persentase', 'max_nilai' => '100'],
            ['nama' => 'Buku Pegangan Guru', 'tipe' => 'ordinal', 'max_nilai' => '1'],
            ['nama' => 'Buku Pegangan Siswa', 'tipe' => 'ordinal', 'max_nilai' => '1'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('kriterias');
    }
};
