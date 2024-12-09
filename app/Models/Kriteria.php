<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriterias';

    protected $fillable = ['nama', 'tipe'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'kriteria_id');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'kriteria_id');
    }
}
