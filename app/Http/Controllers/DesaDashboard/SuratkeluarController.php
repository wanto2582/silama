<?php

namespace App\Http\Controllers\DesaDashboard;

use App\Exports\ReportPengajuankeluar;
use App\Http\Controllers\Controller;
use App\Models\DataWarga;
use App\Models\Suratkeluar\DetailSuratkeluar;
use App\Models\Suratkeluar\PengajuanSuratkeluar;
use App\Models\SuratKematian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdfsuratkeluar;
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

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailSuratkeluar = DetailSuratkeluar::get();
        $warga = DataWarga::get();
        return view('desa.suratkeluar.index', compact('detailSuratkeluar', 'warga'));
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
        $pengajuankeluar = PengajuanSuratkeluar::create(
            [
                'users_id' => Auth::user()->id,
                'tanggal_pengajuan' => date('Y-m-d'),
                'status' => 'Diproses',
            ]
        );

        if ($request->jenis_surat == 'su') {
            DetailSuratkeluar::create([
                'users_id' => Auth::user()->id,
                'pengajuan_suratkeluar_id' => $pengajuankeluar->id,
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
                'jenis_surat' => 'Surat Undangan',
                'kode_surat' => 'su',
                // 'berkassuratkeluar' => $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'yth' => $request->yth,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
            ]);
        }

        if ($request->jenis_surat == 'su5') {
            DetailSuratkeluar::create([
                'users_id' => Auth::user()->id,
                'pengajuan_suratkeluar_id' => $pengajuankeluar->id,
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
                'jenis_surat' => 'Surat Undangan 5',
                'kode_surat' => 'su5',
                // 'berkassuratkeluar' => $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'yth' => $request->yth,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
            ]);
        }

        if ($request->jenis_surat == 'spt') {
            DetailSuratkeluar::create([
                'users_id' => Auth::user()->id,
                'pengajuan_suratkeluar_id' => $pengajuankeluar->id,
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
                'jenis_surat' => 'Surat Perintah Tugas',
                'kode_surat' => 'spt',
                // 'berkassuratkeluar' => $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'yth' => $request->yth,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
                'nip' => $request->nip,
                'pangkat_golongan' => $request->pangkat_golongan,
                'jabatan' => $request->jabatan,
                'lama_perjalanan' => $request->lama_perjalanan,
                'tgl_berangkat' => $request->tgl_berangkat,
                'tgl_pulang' => $request->tgl_pulang,
                'tempat' => $request->tempat,
            ]);
        }

        

        if ($request->jenis_surat == 'sku') {
            DetailSuratkeluar::create([
                'users_id' => Auth::user()->id,
                'pengajuan_suratkeluar_id' => $pengajuankeluar->id,
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
                'jenis_surat' => 'Surat Keterangan Usaha',
                'kode_surat' => 'sku',
                // 'berkassuratkeluar' => $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public'),
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'yth' => $request->yth,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
            ]);
        }
        Alert::success('Sukses!', 'Surat Berhasil Dibuat');
        return redirect()->route('desa.suratkeluar.riwayatsuratkeluar');
    }



    /**
     * Display the specified resource.
     */
    public function showsuratkeluar(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function editsuratkeluar(string $id)
    {
        $detailSuratkeluar = DetailSuratkeluar::where('id', $id)->first();
        return view('desa.suratkeluar.editsuratkeluar', compact('detailSuratkeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detailSuratkeluar = DetailSuratkeluar::where('id', $id)->first();
        $get_berkassuratkeluar = $detailSuratkeluar->berkassuratkeluar;
        // dd($get_berkassuratkeluar);
        if (isset($request->berkassuratkeluar)) {
            $data = 'storage/' . $get_berkassuratkeluar;
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $get_berkassuratkeluar);
            }
        }

        if ($request->jenis_surat == 'su') {
            DetailSuratkeluar::where('id', $id)->update([
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
                'jenis_surat' => 'Surat Undangan',
                'kode_surat' => 'su',
                // 'berkassuratkeluar' => $request->hasFile('berkassuratkeluar') ? $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public') : $detailSuratkeluar->berkassuratkeluar,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'yth' => $request->yth,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
                
            ]);
        }

         if ($request->jenis_surat == 'su5') {
            DetailSuratkeluar::where('id', $id)->update([
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
                'jenis_surat' => 'Surat Undangan 5',
                'kode_surat' => 'su5',
                // 'berkassuratkeluar' => $request->hasFile('berkassuratkeluar') ? $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public') : $detailSuratkeluar->berkassuratkeluar,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'yth' => $request->yth,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
                
            ]);
        }

        if ($request->jenis_surat == 'spt') {
            DetailSuratkeluar::where('id', $id)->update([
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
                'jenis_surat' => 'Surat Perintah Tugas',
                'kode_surat' => 'spt',
                // 'berkassuratkeluar' => $request->hasFile('berkassuratkeluar') ? $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public') : $detailSuratkeluar->berkassuratkeluar,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'yth' => $request->yth,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
                'nip' => $request->nip,
                'pangkat_golongan' => $request->pangkat_golongan,
                'jabatan' => $request->jabatan,
                'lama_perjalanan' => $request->lama_perjalanan,
                'tgl_berangkat' => $request->tgl_berangkat,
                'tgl_pulang' => $request->tgl_pulang,
                 'tempat' => $request->tempat,
                
            ]);
        }

        

        if ($request->jenis_surat == 'sku') {
            DetailSuratkeluar::where('id', $id)->update([
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
                'jenis_surat' => 'Surat Keterangan Usaha',
                'kode_surat' => 'sku',
                'berkassuratkeluar' => $request->hasFile('berkassuratkeluar') ? $request->file('berkassuratkeluar')->store('assets/berkassuratkeluar', 'public') : $detailSuratkeluar->berkassuratkeluar,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'tujuan' => $request->tujuan,
                'paragraf_1' => $request->paragraf_1,
                'paragraf_2' => $request->paragraf_2,
                'paragraf_3' => $request->paragraf_3,
                'yth' => $request->yth,
                'tembusan' => $request->tembusan,
                'sifat' => $request->sifat,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'tgl_surat' => $request->tgl_surat,
            ]);
        }

        Alert::success('Sukses!', 'Surat Berhasil DiEdit');
        return redirect()->route('desa.suratkeluar.riwayatsuratkeluar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroysuratkeluar(string $id)
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $id)->first();
        $detailSuratkeluar = DetailSuratkeluar::where('pengajuan_suratkeluar_id', $id)->first();
        $get_berkassuratkeluar = $detailSuratkeluar->berkassuratkeluar;
        $data = 'storage/' . $get_berkassuratkeluar;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_berkassuratkeluar);
        }
        $pengajuanSuratkeluar->delete();
        $detailSuratkeluar->delete();
        Alert::success('Sukses!', 'Surat Berhasil Dihapus');
        return redirect()->route('desa.suratkeluar.riwayatsuratkeluar');
    }

    public function pdfsuratkeluar(String $id)
    {
        Carbon::setLocale('id');
        $listkeluar = DetailSuratkeluar::where('id', $id)->first();
        $user = User::where('id', $listkeluar->users_id)->first();
        $pdfsuratkeluar = Pdfsuratkeluar::loadView('desa.suratkeluar.pdfsuratkeluar', compact('listkeluar', 'user'))->setPaper('Legal', 'potrait');
        return $pdfsuratkeluar->download('suratkeluar.pdfsuratkeluar');

        // return view('desa.suratkeluar.pdf', compact('user'));
    }

    public function riwayatsuratkeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::where('users_id', Auth::user()->id)
            ->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
            ->with('detail_suratkeluars');

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_suratkeluars', function ($qkeluar) use ($request) {
                $qkeluar->where('nik', 'like', '%' . $request->nik . '%');
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_suratkeluars', function ($qkeluar) use ($request) {
                $qkeluar->where('jenis_surat', $request->jenis_surat);
            });
        }

        $pengajuanSuratkeluar = $query->latest()->get();
        // dd($pengajuanSuratkeluar);

        // If this is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pengajuanSuratkeluar,
                'html' => view('desa.suratkeluar.partials.riwayat-tablesuratkeluar', compact('pengajuanSuratkeluar'))->render()
            ]);
        }

        return view('desa.suratkeluar.riwayatsuratkeluar', compact('pengajuanSuratkeluar'));
    }

    public function draft()
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('users_id', Auth::user()->id)->where('status', 'Draft')->with('detail_suratkeluars')->get();
        return view('desa.suratkeluar.draftsuratkeluarr', compact('pengajuanSuratkeluar'));
    }

    public function berkassuratkeluar($id)
    {
        $berkassuratkeluar = DetailSuratkeluar::where('id', $id)->first();
        // dd($berkassuratkeluar);
        return response()->download(storage_path("app/public/$berkassuratkeluar->berkassuratkeluar"));
    }

    public function sendsuratkeluar($id)
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $id)->first();
        $pengajuanSuratkeluar->update([
            'status' => 'Diproses',
        ]);
        Alert::success('Sukses!', 'Surat Berhasil Dikirim');
        return redirect()->route('desa.suratkeluar.riwayatsuratkeluar');
    }

    public function downloadReportsuratkeluar(Request $request)
    {
        $now = Carbon::now()->format('d-m-Y');


        $query = PengajuanSuratkeluar::where('users_id', Auth::user()->id)
            ->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
            ->with('detail_suratkeluars');

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_suratkeluars', function ($qkeluar) use ($request) {
                $qkeluar->where('nik', $request->nik);
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_suratkeluars', function ($qkeluar) use ($request) {
                $qkeluar->where('jenis_surat', $request->jenis_surat);
            });
        }
        // dd($query->get());
        $filename = 'report_pengajuan_suratkeluar' . $now;
        return Excel::downloadsuratkeluar(new ReportPengajuankeluar($query->get(), []), "$filename.xlsx");



    }

    public function __datatablesuratkeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::where('users_id', Auth::user()->id)
            ->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
            ->with('detail_suratkeluars');

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_suratkeluars', function ($qkeluar) use ($request) {
                $qkeluar->where('nik', $request->nik);
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_suratkeluars', function ($qkeluar) use ($request) {
                $qkeluar->where('jenis_surat', $request->jenis_surat);
            });
        }


        $data = DataTables::of($query)->addIndexColumn()

            ->addColumn('action', function ($model) {
                $download_btn = '';
                $URL = route('unduhkeluar.suratkeluar', ['id' => $model->id]);

                // Check if the status of the model is 'Selesai' (Completed)
                if ($model->status == 'Selesai') {
                    // If status is 'Selesai', generate the download button HTML
                    $download_btn = "
                        <a class='btn btn-icon btn-success mr-1 mb-1 d-flex align-items-center justify-content-center' style='width:32px;height:32px;padding:0;' href='$URL' target='_blank'
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
