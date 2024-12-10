<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained()->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->float('nilai')->nullable(); // Nilai evaluasi
            $table->text('komentar')->nullable(); // Komentar evaluasi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluasis');
    }
};
