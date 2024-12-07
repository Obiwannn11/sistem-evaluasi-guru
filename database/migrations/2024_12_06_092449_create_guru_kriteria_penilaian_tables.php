<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('gurus', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nip');
        $table->string('bidangStudi');
        $table->timestamps();
    });

    Schema::create('kriterias', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->decimal('bobot', 5, 2);
        $table->timestamps();
    });

    Schema::create('penilaians', function (Blueprint $table) {
        $table->id();
        $table->foreignId('guru_id')->constrained('gurus');
        $table->foreignId('kriteria_id')->constrained('kriterias');
        $table->integer('nilai');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    Schema::dropIfExists('penilaians');
    Schema::dropIfExists('kriterias');
    Schema::dropIfExists('gurus');
    }
};
