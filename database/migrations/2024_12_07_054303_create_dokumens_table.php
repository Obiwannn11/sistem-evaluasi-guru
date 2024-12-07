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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('id_guru')->constrained('gurus'); // Relasi ke guru
            $table->foreignId('id_kriteria')->constrained('kriterias'); // Relasi ke kriteria
            $table->string('file_path'); // Lokasi file
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
