<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluasi_id')->constrained('evaluasi')->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
            $table->float('nilai'); // Nilai yang diberikan kepala sekolah
            $table->text('komentar')->nullable(); // Komentar untuk kriteria tertentu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
