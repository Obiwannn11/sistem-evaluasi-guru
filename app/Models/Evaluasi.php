<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasis';

    protected $fillable = ['guru_id', 'kriteria_id', 'nilai', 'komentar'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'evaluasi_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
