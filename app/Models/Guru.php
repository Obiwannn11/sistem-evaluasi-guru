<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nama', 'email', 'password'];

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_guru');
    }

    public function skors()
    {
        return $this->hasMany(Skor::class, 'id_guru');
    }

    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class, 'id_guru');
    }
}

