<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSurat extends Model
{
    use HasFactory;

        protected $fillable = [
            'users_id',
            'pengajuan_surat_id',
            'nomor_surat',
            'tanggal_surat',
            'nama_surat',
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
            'ttd_nama',
            'ttd_jabatan',
            'anak_nama',
            'anak_ke',
            'anak_tempat_lahir',
            'anak_tanggal_lahir',
            'anak_gender',
            'anak_alamat',
            'penolong',
            'penolong_alamat',
            'ibu_nama',
            'ibu_nik',
            'ibu_tempat_lahir',
            'ibu_tanggal_lahir',
            'ibu_alamat',
            'ayah_nama',
            'ayah_nik',
            'ayah_tempat_lahir',
            'ayah_tanggal_lahir',
            'ayah_alamat',
            'jenis_kegiatan',
            'lokasi_kegiatan',
            'waktu_kegiatan',
            'jenis_hiburan', 
        ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
    public function pengajuan_surats(){
        return $this->belongsTo('App\Models\Surat\PengajuanSurat', 'pengajuan_surat_id', 'id');
    }
}
