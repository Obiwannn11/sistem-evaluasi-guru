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
            $table->foreignId('guru_id')
                ->constrained('gurus')
                ->onDelete('cascade');
            $table->foreignId('kriteria_id')
                ->constrained('kriterias')
                ->onDelete('cascade');
            $table->decimal('nilai', 5, 2)->nullable(); // Menyimpan nilai dengan format desimal (maksimal 100.00)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluasis');
    }
};
