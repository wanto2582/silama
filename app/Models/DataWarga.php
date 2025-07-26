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
        'alamat',
        'foto',
        'created_at',
        'updated_at',
        'deleted_at',
        'map',
        'dusun',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'kk',
        'no_hp',
        'email',
        'pendidikan',
        'ayah',
        'ibu',
        'status',
        'no_rumah',
        'no_tlp',
        'kedudukan_dlm_keluarga',
        'dapat_membaca_huruf',
        'keterangan',
    ];
}
