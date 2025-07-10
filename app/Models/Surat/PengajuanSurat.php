<?php

namespace App\Models\Surat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'tanggal_pengajuan',
        'status',
        'keterangan'
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function detail_surats()
    {
        return $this->hasOne('App\Models\Surat\DetailSurat', 'pengajuan_surat_id');
    }

    public function detail_surats_notifikasi()
    {
        return $this->hasMany('App\Models\Surat\DetailSurat', 'pengajuan_surat_id');
    }
}
