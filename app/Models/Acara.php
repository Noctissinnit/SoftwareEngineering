<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $fillable = ['judul', 'tanggal', 'penulis','deskripsi', 'foto'];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
