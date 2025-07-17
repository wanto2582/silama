<?php

namespace App\Http\Controllers\DesaDashboard;

use App\Exports\ReportPengajuan;
use App\Http\Controllers\Controller;
use App\Models\DataWarga;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\SuratKematian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
// use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Browsershot\Browsershot;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailSurat = DetailSurat::get();
        $warga = DataWarga::get();
        return view('desa.surat.index', compact('detailSurat', 'warga'));
    }

    public function getWargaData($nik)
    {
        // Find the resident (warga) by NIK
        $warga = DataWarga::where('nik', $nik)->first();

        // Check if data is found
        if ($warga) {
            // Return the data as JSON
            return response()->json($warga);
        } else {
            // Return an empty response or an error message if not found
            return response()->json(['message' => 'Data warga tidak ditemukan'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $pengajuan = PengajuanSurat::create(
            [
                'users_id' => Auth::user()->id,
                'tanggal_pengajuan' => date('Y-m-d'),
                'status' => 'Diproses',
            ]
        );

        if ($request->jenis_surat == 'skd') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Domisili',
                'kode_surat' => 'skd',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
            ]);
        }

        if ($request->jenis_surat == 'sks') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Sakit',
                'kode_surat' => 'sks',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'paragraf_1' => $request->paragraf_1,
                'tujuan' => $request->tujuan,
            ]);
        }

        if ($request->jenis_surat == 'skk') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'tanggal_meninggal' => $request->tanggal_meninggal,
                'jam_meninggal' => $request->jam_meninggal,
                'tempat_meninggal' => $request->tempat_meninggal,
                'sebab_meninggal' => $request->sebab_meninggal,
                'jenis_surat' => 'Surat Keterangan Kematian',
                'kode_surat' => 'skk',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

        if ($request->jenis_surat == 'sktm') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                'kode_surat' => 'sktm',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

        if ($request->jenis_surat == 'skkk') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Kepemilikan Kendaraan',
                'kode_surat' => 'skkk',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'merk_type' => $request->merk_type,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'warna' => $request->warna,
                'nomor_bpkb' => $request->nomor_bpkb,
                'nomor_mesin' => $request->nomor_mesin,
                'nomor_rangka' => $request->nomor_rangka,
                'nomor_polisi' => $request->nomor_polisi,
                'atas_nama' => $request->atas_nama,
            ]);
        }

        if ($request->jenis_surat == 'sku') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Usaha',
                'kode_surat' => 'sku',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_instansi' => $request->nama_instansi,
                'mulai_usaha' => $request->mulai_usaha,
                'alamat_usaha' => $request->alamat_usaha,
            ]);
        }

        if ($request->jenis_surat == 'skl') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'kewarganegaraan' => $request->kewarganegaraan,
                'tujuan' => $request->tujuan,
                'jenis_surat' => 'Surat Keterangan Kelahiran',
                'kode_surat' => 'skl',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'ttd_nama' => $request->ttd_nama,
                'ttd_jabatan' => $request->ttd_jabatan,
                'anak_nama' => $request->anak_nama,
                'anak_ke' => $request->anak_ke,
                'anak_ke_angka' => $request->anak_ke_angka,
                'anak_gender' => $request->anak_gender,
                'anak_tempat_lahir' => $request->anak_tempat_lahir,
                'anak_tanggal_lahir' => $request->anak_tanggal_lahir,
                'anak_alamat' => $request->anak_alamat,
                'penolong' => $request->penolong,
                'penolong_alamat' => $request->penolong_alamat,
                'ibu_nik' => $request->ibu_nik,
                'ibu_nama' => $request->ibu_nama,
                'ibu_tempat_lahir' => $request->ibu_tempat_lahir,
                'ibu_tanggal_lahir' => $request->ibu_tanggal_lahir,
                'ibu_alamat' => $request->ibu_alamat,
                'ayah_nik' => $request->ayah_nik,
                'ayah_nama' => $request->ayah_nama,
                'ayah_tempat_lahir' => $request->ayah_tempat_lahir,
                'ayah_tanggal_lahir' => $request->ayah_tanggal_lahir,
                'ayah_alamat' => $request->ayah_alamat,

            ]);
        }

        if ($request->jenis_surat == 'sikd') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'kewarganegaraan' => $request->kewarganegaraan,
                'tujuan' => $request->tujuan,
                'jenis_surat' => 'Surat Izin Kepala Desa',
                'kode_surat' => 'sikd',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'ttd_nama' => $request->ttd_nama,
                'ttd_jabatan' => $request->ttd_jabatan,
                

            ]);
        }

        if ($request->jenis_surat == 'spa') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pernyataan a',
                'kode_surat' => 'spa',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
            ]);
        }

        if ($request->jenis_surat == 'spb') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pernyataan b',
                'kode_surat' => 'spb',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
            ]);
        }

        if ($request->jenis_surat == 'lsk') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Layoute Surat Keterangan',
                'kode_surat' => 'lsk',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_surat' => $request->nama_surat,
                'paragraf_1' => $request->paragraf_1,
            ]);
        }
         if ($request->jenis_surat == 'sptn') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pernyataan', 
                'kode_surat' => 'sptn',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_surat' => $request->nama_surat,
                'paragraf_1' => $request->paragraf_1,
            ]);
        }

         if ($request->jenis_surat == 'speng') {
            DetailSurat::create([
                'users_id' => Auth::user()->id,
                'pengajuan_surat_id' => $pengajuan->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pengantar', 
                'kode_surat' => 'speng',
                'berkas' => $request->file('berkas')->store('assets/berkas', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_surat' => $request->nama_surat,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
            ]);
        }


        Alert::success('Sukses!', 'Surat Berhasil Dibuat');
        return redirect()->route('desa.surat.riwayat');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        return view('desa.surat.edit', compact('detailSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        $get_berkas = $detailSurat->berkas;
        // dd($get_berkas);
        if (isset($request->berkas)) {
            $data = 'storage/' . $get_berkas;
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $get_berkas);
            }
        }

        if ($request->jenis_surat == 'skd') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Domisili',
                'kode_surat' => 'skd',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

         if ($request->jenis_surat == 'sks') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Sakit',
                'kode_surat' => 'sks',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'paragraf_1' => $request->paragraf_1,
                'tujuan' => $request->tujuan,
            ]);
        }

        if ($request->jenis_surat == 'skk') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'tanggal_meninggal' => $request->tanggal_meninggal,
                'jam_meninggal' => $request->jam_meninggal,
                'tempat_meninggal' => $request->tempat_meninggal,
                'sebab_meninggal' => $request->sebab_meninggal,
                'jenis_surat' => 'Surat Keterangan Kematian',
                'kode_surat' => 'skk',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

        if ($request->jenis_surat == 'sktm') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                'kode_surat' => 'sktm',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

        if ($request->jenis_surat == 'lsk') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Layoute Surat Keterangan',
                'kode_surat' => 'lsk',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_surat' => $request->nama_surat,
                'paragraf_1' => $request->paragraf_1,
            ]);
        }


         if ($request->jenis_surat == 'skkk') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Kepemilikan Kendaraan',
                'kode_surat' => 'skkk',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'merk_type' => $request->merk_type,
                'tahun_pembuatan' => $request->tahun_pembuatan,
                'warna' => $request->warna,
                'nomor_bpkb' => $request->nomor_bpkb,
                'nomor_mesin' => $request->nomor_mesin,
                'nomor_rangka' => $request->nomor_rangka,
                'nomor_polisi' => $request->nomor_polisi,
                'atas_nama' => $request->atas_nama,
            ]);
        }

        if ($request->jenis_surat == 'sku') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Keterangan Usaha',
                'kode_surat' => 'sku',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_instansi' => $request->nama_instansi,
                'mulai_usaha' => $request->mulai_usaha,
                'alamat_usaha' => $request->alamat_usaha,
            ]);
        }

        if ($request->jenis_surat == 'skl') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'jenis_surat' => 'Surat Keterangan Kelahiran',
                'kode_surat' => 'skl',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'tujuan' => $request->tujuan,
                'ttd_nama' => $request->ttd_nama,
                'ttd_jabatan' => $request->ttd_jabatan,
                'anak_nama' => $request->anak_nama,
                'anak_ke' => $request->anak_ke,
                'anak_ke_angka' => $request->anak_ke_angka,
                'anak_gender' => $request->anak_gender,
                'anak_tempat_lahir' => $request->anak_tempat_lahir,
                'anak_tanggal_lahir' => $request->anak_tanggal_lahir,
                'anak_alamat' => $request->anak_alamat,
                'penolong' => $request->penolong,
                'penolong_alamat' => $request->penolong_alamat,
                'ibu_nik' => $request->ibu_nik,
                'ibu_nama' => $request->ibu_nama,
                'ibu_tempat_lahir' => $request->ibu_tempat_lahir,
                'ibu_tanggal_lahir' => $request->ibu_tanggal_lahir,
                'ibu_alamat' => $request->ibu_alamat,
                'ayah_nik' => $request->ayah_nik,
                'ayah_nama' => $request->ayah_nama,
                'ayah_tempat_lahir' => $request->ayah_tempat_lahir,
                'ayah_tanggal_lahir' => $request->ayah_tanggal_lahir,
                'ayah_alamat' => $request->ayah_alamat,
            ]);
        }

        if ($request->jenis_surat == 'sikd') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'jenis_surat' => 'Surat Izin Kepala Desa',
                'kode_surat' => 'sikd',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'tujuan' => $request->tujuan,
                'ttd_nama' => $request->ttd_nama,
                'ttd_jabatan' => $request->ttd_jabatan,
               
            ]);
        }


        if ($request->jenis_surat == 'spa') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pernyataan a',
                'kode_surat' => 'spa',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

        if ($request->jenis_surat == 'spb') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'bin' => $request->bin,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pernyataan b',
                'kode_surat' => 'spb',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }
         if ($request->jenis_surat == 'sptn') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pernyataan',
                'kode_surat' => 'sptn',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_surat' => $request->nama_surat,
                'paragraf_1' => $request->paragraf_1,
            ]);
        }

        if ($request->jenis_surat == 'speng') {
            DetailSurat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'status_pernikahan' => $request->status_pernikahan,
                'tujuan' => $request->tujuan,
                'alamat' => $request->alamat,
                'jenis_surat' => 'Surat Pengantar',
                'kode_surat' => 'speng',
                'berkas' => $request->hasFile('berkas') ? $request->file('berkas')->store('assets/berkas', 'public') : $detailSurat->berkas,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'nama_surat' => $request->nama_surat,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
            ]);
        }


        Alert::success('Sukses!', 'Surat Berhasil DiEdit');
        return redirect()->route('desa.surat.riwayat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $detailSurat = DetailSurat::where('pengajuan_surat_id', $id)->first();
        $get_berkas = $detailSurat->berkas;
        $data = 'storage/' . $get_berkas;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_berkas);
        }
        $pengajuanSurat->delete();
        $detailSurat->delete();
        Alert::success('Sukses!', 'Surat Berhasil Dihapus');
        return redirect()->route('desa.surat.riwayat');
    }

    public function pdf(String $id)
    {
        Carbon::setLocale('id');
        $list = DetailSurat::where('id', $id)->first();
        $user = User::where('id', $list->users_id)->first();
        $pdf = Pdf::loadView('desa.surat.pdf', compact('list', 'user'))->setPaper('Legal', 'potrait');
        return $pdf->download('surat.pdf');

        // return view('desa.surat.pdf', compact('user'));
    }

    public function riwayat(Request $request)
    {
        $query = PengajuanSurat::where('users_id', Auth::user()->id)
            ->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
            ->with('detail_surats');

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_surats', function ($q) use ($request) {
                $q->where('nik', 'like', '%' . $request->nik . '%');
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_surats', function ($q) use ($request) {
                $q->where('jenis_surat', $request->jenis_surat);
            });
        }

        $pengajuanSurat = $query->latest()->get();
        // dd($pengajuanSurat);

        // If this is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pengajuanSurat,
                'html' => view('desa.surat.partials.riwayat-table', compact('pengajuanSurat'))->render()
            ]);
        }

        return view('desa.surat.riwayat', compact('pengajuanSurat'));
    }

    public function draft()
    {
        $pengajuanSurat = PengajuanSurat::where('users_id', Auth::user()->id)->where('status', 'Draft')->with('detail_surats')->get();
        return view('desa.surat.draft', compact('pengajuanSurat'));
    }

    public function berkas($id)
    {
        $berkas = DetailSurat::where('id', $id)->first();
        // dd($berkas);
        return response()->download(storage_path("app/public/$berkas->berkas"));
    }

    public function send($id)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $pengajuanSurat->update([
            'status' => 'Diproses',
        ]);
        Alert::success('Sukses!', 'Surat Berhasil Dikirim');
        return redirect()->route('desa.surat.riwayat');
    }

    public function downloadReport(Request $request)
    {
        $now = Carbon::now()->format('d-m-Y');

        // dd($request->all());
        // $nik = $request->get('nik');
        // $jenis_surat = $request->get('jenis_surat');

        $query = PengajuanSurat::where('users_id', Auth::user()->id)
            ->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
            ->with('detail_surats');

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_surats', function ($q) use ($request) {
                $q->where('nik', $request->nik);
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_surats', function ($q) use ($request) {
                $q->where('jenis_surat', $request->jenis_surat);
            });
        }
        // dd($query->get());
        $filename = 'report_pengajuan_' . $now;
        return Excel::download(new ReportPengajuan($query->get(), []), "$filename.xlsx");

        //        $this->reportorderService->generateReportUsage($dataReport);
        //        return Excel::download(new ReportLimitUsage($dataReport), "$filename.xlsx");



    }

    public function __datatable(Request $request)
    {
        $query = PengajuanSurat::where('users_id', Auth::user()->id)
            ->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
            ->with('detail_surats');

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_surats', function ($q) use ($request) {
                $q->where('nik', $request->nik);
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_surats', function ($q) use ($request) {
                $q->where('jenis_surat', $request->jenis_surat);
            });
        }

        // $pengajuanSurat = $query->latest()->first();
        // dd($pengajuanSurat);
        // dd($model['1']['product']);
        $data = DataTables::of($query)->addIndexColumn()

            ->addColumn('action', function ($model) {
                $download_btn = '';
                $URL = route('unduh.surat', ['id' => $model->id]);

                // Check if the status of the model is 'Selesai' (Completed)
                if ($model->status == 'Selesai') {
                    // If status is 'Selesai', generate the download button HTML
                    $download_btn = "
                        <a class='btn btn-icon btn-success mr-1 mb-1 d-flex align-items-center justify-content-center' style='width:32px;height:22px;padding:0;' href='$URL' target='_blank'
                                data-toggle='tooltip' data-placement='top' title='Download Surat'>
                                    <i class='dw dw-download' style='font-size:1.rem;'></i>
                                </a>";
                }


                $action = $download_btn;
                return $action;
            })
            ->make(true);
        return $data;
    }
}
