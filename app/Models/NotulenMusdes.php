<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotulenMusdes extends Model
{
    use HasFactory;
    protected $table = 'notulen_musdes';

    protected $fillable = [
        'nama',
        'perihal',
        'nama_kades',
        'tahun',
        'file',
    ];
}
