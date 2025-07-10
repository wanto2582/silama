<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWarga extends Model
{
    use HasFactory;
    protected $table = 'warga';

    protected $fillable = [
        'id',
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'kewarganegaraan',
        'pekerjaan',
        'status_pernikahan',
        'desa',
        'rt',
        'rw',
    ];
}
