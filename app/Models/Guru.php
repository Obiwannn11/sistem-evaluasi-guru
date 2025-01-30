<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = ['nama', 'nip', 'email', 'telepon', 'password'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'guru_id');
    }

    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'guru_id');
    }
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'guru_id');
    }
}
