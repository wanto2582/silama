<?php

namespace App\Models\Suratkeluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSuratkeluar extends Model
{
    use HasFactory;

        protected $fillable = [
            'users_id',
            'pengajuan_suratkeluar_id',
            'nomor_suratkeluar',
            'tanggal_surat',
            'nama',
            'nik',
            'nkk',
            'gender',
            'agama',
            'tempat_lahir',
            'tanggal_lahir',
            'kewarganegaraan',
            'pendidikan',
            'pekerjaan',
            'status_pernikahan',
            'alamat',
            'ketua',
            'bin',
            'tanggal_meninggal',
            'jam_meninggal',
            'tempat_meninggal',
            'sebab_meninggal',
            'nama_instansi',
            'jurusan',
            'semester',
            'mulai_usaha',
            'alamat_usaha',
            'tujuan',
            'alasan_pindah',
            'keterangan',
            'merk_type',
            'tahun_pembuatan',
            'warna',
            'nomor_polisi',
            'nomor_bpkb',
            'nomor_mesin',
            'nomor_rangka',
            'atas_nama',
            'jenis_surat',
            'kode_surat',
            'berkas',
            'dusun',
            'rt',
            'rw',
            'paragraf_1',
            'paragraf_2',
            'paragraf_3',
            'sifat',
            'lampiran',
            'perihal',
            'yth',
            'hari',
            'waktu',
            'tempat',
            'tembusan',
            'nip',
            'pangkat_golongan',
            'jabatan',
            'lama_perjalanan',
            'tgl_berangkat',
            'tgl_pulang',

        ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
    public function pengajuan_suratkeluars(){
        return $this->belongsTo('App\Models\Suratkeluar\PengajuanSuratkeluar', 'pengajuan_suratkeluar_id', 'id');
    }
}
