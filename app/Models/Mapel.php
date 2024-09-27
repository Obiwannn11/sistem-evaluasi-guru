<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [

        'nama_mapel',
        'user_id',
        'cp',
        'atp',
        'ma',
        'prosem',
        'prota',
        'kktp',
        'bba',
        'bonus',

    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
