<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $primaryKey = 'id_dokumen';
    protected $fillable = ['id_guru', 'id_kriteria', 'file_path'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}

