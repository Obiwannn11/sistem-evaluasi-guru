<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    protected $primaryKey = 'id_skor';
    protected $fillable = ['id_guru', 'id_kriteria', 'nilai'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}

