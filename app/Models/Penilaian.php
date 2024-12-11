<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaians';

    protected $fillable = ['evaluasi_id', 'kriteria_id', 'nilai', 'komentar'];

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
