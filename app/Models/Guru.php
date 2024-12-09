<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = ['nama', 'nip', 'email', 'telepon'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'guru_id');
    }

    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'guru_id');
    }
}
