<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('id_guru')->constrained('gurus'); // Relasi ke guru
            $table->date('tanggal_evaluasi'); // Tanggal evaluasi
            $table->integer('total_skor')->default(0); // Total skor dari semua kriteria
            $table->decimal('nilai_akhir', 5, 2)->default(0.00); // Nilai akhir (persentase)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
