<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahDidesa extends Model
{
    use HasFactory;
    protected $table = 'tanah_didesa';

    protected $fillable = [
        'nama',
        'perihal',
        'nama_kades',
        'tahun',
        'file',
    ];
}
