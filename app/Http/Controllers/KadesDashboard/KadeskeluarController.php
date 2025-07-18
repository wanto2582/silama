<?php

namespace App\Http\Controllers\KadesDashboard;

use App\Http\Controllers\Controller;
use App\Models\Suratkeluar\DetailSuratkeluar;
use App\Models\Suratkeluar\PengajuanSuratkeluar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class KadeskeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Dikonfirmasi']);

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

        return view('kades.pengajuankeluar.index', compact('pengajuanSuratkeluar'));
    }

    public function previewPdf(string $pengajuankeluarId)
    {
        // Cari PengajuanSurat berdasarkan $pengajuanId
        $pskeluar = PengajuanSuratkeluar::with('detail_suratkeluars')->findOrFail($pengajuankeluarId);

        // Ambil detail surat yang terkait. Asumsi hanya ada satu detail_surat per pengajuan.
        // Jika ada multiple detail_surat, Anda perlu logika lebih lanjut untuk memilih yang mana.
        $listkeluar = $pskeluar->detail_suratkeluars->first();

        if (!$listkeluar) {
            abort(404, 'Detail Surat tidak ditemukan.');
        }

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');

        $selesaiStatus = PengajuanSuratkeluar::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'desc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $listkeluar->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://silama.apk62.com/cekkeluar/suratkeluar/' . $listkeluar->id);

        // Load view 'front.unduh' dengan data dan generate PDF
        $pdf = Pdf::loadView('front.unduhkeluar', compact('listkeluar', 'pskeluar', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');

        // Mengembalikan PDF sebagai response
        return $pdf->stream('preview_surat_' . $listkeluar->id . '.pdf');
    }


    public function show(string $id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $listkeluar = DetailSuratkeluar::where('id', $id)->first();
        $pskeluar = PengajuanSuratkeluar::where('id', $listkeluar->pengajuan_suratkeluar_id)->first();
        $selesaiStatus = PengajuanSuratkeluar::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'desc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $listkeluar->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://silama.apk62.com/cekkeluar/suratkeluar/' . $listkeluar->id);
        $pdf = Pdf::loadView('front.unduhkeluar', compact('listkeluar', 'pskeluar', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');

        if ($listkeluar->jenis_surat == 'Surat Undangan') {
            return view('kades.pengajuankeluar.show', ['pdfContent' => $pdf->output(), 'pskeluar' => $pskeluar, 'listkeluar' => $listkeluar]);
        } else if ($listkeluar->jenis_surat == 'Surat Undangan 5') {
            return view('kades.pengajuankeluar.show', ['pdfContent' => $pdf->output(), 'pskeluar' => $pskeluar, 'listkeluar' => $listkeluar]);
        } else if ($listkeluar->jenis_surat == 'Surat Perintah Tugas') {
            return view('kades.pengajuankeluar.show', ['pdfContent' => $pdf->output(), 'pskeluar' => $pskeluar, 'listkeluar' => $listkeluar]);
        
        }

        // return view('kades.pengajuankeluar.show', ['pdfContent' => $pdf->output()]);
    }

    public function acckeluar(Request $request, string $id)
    {
        $detailSuratkeluar = DetailSuratkeluar::where('id', $id)->first();
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $detailSuratkeluar->pengajuan_suratkeluar_id)->first();
        $pengajuanSuratkeluar->status = 'Selesai';
        $pengajuanSuratkeluar->save();
        Alert::success('Sukses!', 'Surat Berhasil disetujui');
        return redirect(route('kades.pengajuankeluar.index', $id));
    }

    public function rejkeluar(Request $request, string $id)
    {
        $detailSuratkeluar = DetailSuratkeluar::where('id', $id)->first();
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $detailSuratkeluar->pengajuan_suratkeluar_id)->first();
        $pengajuanSuratkeluar->keterangan = $request->keterangan;
        $pengajuanSuratkeluar->status = 'Ditolak';
        $pengajuanSuratkeluar->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('kades.pengajuankeluar.index', $id));
    }

    public function dashboard()
    {
        $pskeluar = PengajuanSuratkeluar::get();
        return view('kades.dashboard', compact('pskeluar'));
    }

    public function listkeluar()
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Selesai', 'Expired'])
            ->latest()->get();

        return view('kades.pengajuankeluar.listkeluar', compact('pengajuanSuratkeluar'));
    }

    public function rejectkeluar()
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Ditolak'])
            ->latest()->get();
        // dd($pengajuanSuratkeluar);

        return view('kades.pengajuankeluar.rejectkeluar', compact('pengajuanSuratkeluar'));
    }

    public function berkassuratkeluar($id)
    {
        // $selesaiStatus = PengajuanSuratkeluar::where('status', 'selesai')->orderBy('created_at', 'desc')->get();
        $selesaiStatus = PengajuanSuratkeluar::where('status', 'selesai')->orderBy('created_at', 'desc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);

        // Output indeks
        print_r($indeks[14]);
        // dd($selesaiStatus);
        return view('kades.pengajuankeluar.skeluar');
        $listkeluar = DetailSuratkeluar::where('id', $id)->first();
        $pskeluar = PengajuanSuratkeluar::where('id', $listkeluar->pengajuan_suratkeluar_id)->first();
        $user = User::where('id', $listkeluar->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://silama.apk62.com/cekkeluar/suratkeluar/' . $listkeluar->id);
        $pdf = Pdf::loadView('front.unduhkeluar', compact('listkeluar', 'user', 'qrCodes'))->setPaper('Legal', 'portrait');
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/temp/bubla.pdf', $content);
    }


    public function ttdkeluar(Request $request, $id)
    {
        if (Hash::check($request->ttdkeluar, Auth::user()->password)) {
            $pengajuankeluar = PengajuanSuratkeluar::find($id);
            $pengajuankeluar->status = "Selesai";
            $pengajuankeluar->save();
        } else {
            return "salah";
        }

        Alert::success('Sukses!', 'Surat Berhasil Ditandatangani');
        return redirect()->route('kades.pengajuankeluar.listkeluar');
    }

    public function tolakkeluar(String $id, Request $request)
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $id)->first();
        $pengajuanSuratkeluar->keterangan = $request->keterangan;
        $pengajuanSuratkeluar->status = 'Ditolak';
        $pengajuanSuratkeluar->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('kades.pengajuankeluar.rejectkeluar'));
    }

    public function __datatablekeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Dikonfirmasi']);
        // dd($query->get());

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

        // $pengajuanSuratkeluar = $query->latest()->first();
        // dd($pengajuanSuratkeluar);
        // dd($model['1']['product']);
        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $download_btn = '';
                $URL = route('kades.pengajuankeluar.show', $model->id);

                // Check if the status of the model is 'Selesai' (Completed)
                if ($model->status == 'Dikonfirmasi') {
                    // If status is 'Selesai', generate the download button HTML
                    $download_btn = "
                        <a class='btn btn-icon btn-primary mr-1 mb-1' href='$URL'
                        data-toggle='tooltip' data-placement='top' title='Unduh Surat' id='download-button' data-name='$model->name' data-id='$model->id'>
                            <i class='dw dw-eye' style='font-size: 2vh !important;'></i>
                        </a>";
                }


                $action = $download_btn;
                return $action;
            })
            ->make(true);
        return $data;
    }

   public function __listDatatablekeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Selesai', 'Expired']);

        // Apply filters if provided
        if ($request->has('nik') && !empty($request->nik)) {
            $query->whereHas('detail_suratkeluars', function ($q) use ($request) {
                $q->where('nik', 'like', '%' . $request->nik . '%');
            });
        }

        if ($request->has('jenis_surat') && !empty($request->jenis_surat)) {
            $query->whereHas('detail_suratkeluars', function ($q) use ($request) {
                $q->where('jenis_surat', $request->jenis_surat);
            });
        }

        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $detailSuratkeluar = $model->detail_suratkeluars->first();
                $actions = '';
                $URL = route('unduh.surat', ['id' => $model->id]);
                $viewURL = route('cekkeluar.suratkeluar', $detailSuratkeluar->id);
                $actions .= "<span class='d-flex align-items-center justify-content-center'>";

                // View button
                $actions .= "<a class='btn btn-icon btn-primary mr-1 mb-1 d-flex align-items-center justify-content-center' style='width:32px;height:32px;padding:0;' href='{$viewURL}' target='_blank'
                            data-toggle='tooltip' data-placement='top' title='Lihat Detail'>
                                <i class='dw dw-eye' style='font-size:1.2rem;'></i>
                            </a>";

                // Download button for completed letters
                if ($model->status == 'Selesai') {
                    $actions .= "<a class='btn btn-icon btn-success mr-1 mb-1 d-flex align-items-center justify-content-center' style='width:32px;height:32px;padding:0;' href='$URL' target='_blank'
                                data-toggle='tooltip' data-placement='top' title='Download Surat'>
                                    <i class='dw dw-download' style='font-size:1.2rem;'></i>
                                </a>";
                                
                }

                $actions .= "</div>";

                // Download berkas if available
                // if ($detailSurat->berkas) {
                //     $berkasURL = route('staff.pengajuan.berkas', $detailSurat->id);
                //     $actions .= "<a class='btn btn-icon btn-warning mr-1 mb-1' href='{$berkasURL}'
                //                 data-toggle='tooltip' data-placement='top' title='Download Berkas'>
                //                     <i class='fa fa-file' style='font-size: 2vh !important;'></i>
                //                 </a>";
                // }

                return $actions;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);

        return $data;
    }

    public function __listRejectDatatablekeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Ditolak']);

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

        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $detailSuratkeluar = $model->detail_suratkeluars->first();
                $actions = '';
                $URL = route('unduhkeluar.suratkeluar', ['id' => $model->id]);
                // View button
                // $viewURL = route('staff.pengajuan.show', $detailSuratkeluar->id);
                // $actions .= "<a class='btn btn-icon btn-primary mr-1 mb-1' href='{$viewURL}'
                //             data-toggle='tooltip' data-placement='top' title='Lihat Detail'>
                //                 <i class='dw dw-eye' style='font-size: 2vh !important;'></i>
                //             </a>";

                // Download button for completed letters
                if ($model->status == 'Selesai') {
                    $actions .= "<a class='btn btn-icon btn-success mr-1 mb-1' href='$URL' target='_blank'
                                data-toggle='tooltip' data-placement='top' title='Download Surat'>
                                    <i class='dw dw-download' style='font-size: 2vh !important;'></i>
                                </a>";
                }

                // Download berkas if available
                // if ($detailSuratkeluar->berkas) {
                //     $berkasURL = route('staff.pengajuan.berkas', $detailSuratkeluar->id);
                //     $actions .= "<a class='btn btn-icon btn-warning mr-1 mb-1' href='{$berkasURL}'
                //                 data-toggle='tooltip' data-placement='top' title='Download Berkas'>
                //                     <i class='fa fa-file' style='font-size: 2vh !important;'></i>
                //                 </a>";
                // }

                return $actions;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);

        return $data;
    }
}
