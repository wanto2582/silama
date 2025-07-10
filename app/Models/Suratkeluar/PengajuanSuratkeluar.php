<?php

namespace App\Models\Suratkeluar;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSuratkeluar extends Model
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

    public function detail_suratkeluars()
    {
        return $this->hasOne('App\Models\Suratkeluar\DetailSuratkeluar', 'pengajuan_suratkeluar_id');
    }
}
