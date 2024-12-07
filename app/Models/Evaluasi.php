<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $primaryKey = 'id_evaluasi';
    protected $fillable = ['id_guru', 'tanggal_evaluasi', 'total_skor', 'nilai_akhir'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}

