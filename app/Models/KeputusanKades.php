<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeputusanKades extends Model
{
    use HasFactory;
    protected $table = 'keputusan_kades';

    protected $fillable = [
        'nama',
        'perihal',
        'nama_kades',
        'tahun',
        'file',
    ];
}
