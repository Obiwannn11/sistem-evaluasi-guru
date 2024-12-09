<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumens';

    protected $fillable = ['guru_id', 'kriteria_id', 'file_path'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
