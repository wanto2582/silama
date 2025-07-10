<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeraturanDesa extends Model
{
    use HasFactory;
    protected $table = 'peraturan_desa';

    protected $fillable = [
        'nama',
        'perihal',
        'nama_kades',
        'tahun',
        'file',
    ];
}
