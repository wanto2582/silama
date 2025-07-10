<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AparaturPemdes extends Model
{
    use HasFactory;
    protected $table = 'aparatur_pemdes';

    protected $fillable = [
        'nama',
        'perihal',
        'nama_kades',
        'tahun',
        'file',
    ];
}
