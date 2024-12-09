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
            $table->timestamps();
        });

        // Insert predefined kriteria
        DB::table('kriterias')->insert([
            ['nama' => 'Kalender Pendidikan', 'tipe' => 'ordinal'],
            ['nama' => 'Program Tahunan', 'tipe' => 'ordinal'],
            ['nama' => 'Program Semester', 'tipe' => 'ordinal'],
            ['nama' => 'Silabus', 'tipe' => 'ordinal'],
            ['nama' => 'Rencana Pelaksanaan Pembelajaran', 'tipe' => 'ordinal'],
            ['nama' => 'Jadwal Tatap Muka', 'tipe' => 'ordinal'],
            ['nama' => 'Agenda Harian', 'tipe' => 'ordinal'],
            ['nama' => 'Daftar Nilai', 'tipe' => 'numerik'],
            ['nama' => 'Kriteria Ketuntasan Minimal', 'tipe' => 'numerik'],
            ['nama' => 'Absen Siswa', 'tipe' => 'persentase'],
            ['nama' => 'Buku Pegangan Guru', 'tipe' => 'ordinal'],
            ['nama' => 'Buku Pegangan Siswa', 'tipe' => 'ordinal'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('kriterias');
    }
};
