<?php

namespace App\Http\Controllers\KadesDashboard;

use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
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

class KadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Dikonfirmasi']);

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

        return view('kades.pengajuan.index', compact('pengajuanSurat'));
    }

     public function previewPdf(string $pengajuanId)
    {
        // Cari PengajuanSurat berdasarkan $pengajuanId
        $ps = PengajuanSurat::with('detail_surats')->findOrFail($pengajuanId);

        // Ambil detail surat yang terkait. Asumsi hanya ada satu detail_surat per pengajuan.
        // Jika ada multiple detail_surat, Anda perlu logika lebih lanjut untuk memilih yang mana.
        $list = $ps->detail_surats->first();

        if (!$list) {
            abort(404, 'Detail Surat tidak ditemukan.');
        }

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');

        $selesaiStatus = PengajuanSurat::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('http://127.0.0.1:8000/cek/surat/' . $list->id);

        // Load view 'front.unduh' dengan data dan generate PDF
        $pdf = Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');

        // Mengembalikan PDF sebagai response
        return $pdf->stream('preview_surat_' . $list->id . '.pdf');
    }

    public function show(string $id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        $selesaiStatus = PengajuanSurat::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('http://127.0.0.1:8000/cek/surat/' . $list->id);
        $pdf = Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');

        // SURAT KETERANGAN
        if ($list->jenis_surat == 'Surat Keterangan Usaha') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Kepemilikan Kendaraan') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Sakit') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Domisili') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Kematian') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Tidak Mampu') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Kelahiran') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
         // LAYOUTE SURAT KETERANGAN
        } else if ($list->jenis_surat == 'Layoute Surat Keterangan') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);

           
            // SURAT IZIN / REKOMENDASI
        } else if ($list->jenis_surat == 'Surat Izin Kepala Desa') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);


        // SURAT PERNYATAAN
        } else if ($list->jenis_surat == 'Surat Pernyataan a') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Pernyataan b') {
            return view('kades.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);

        }

        // return view('kades.pengajuan.show', ['pdfContent' => $pdf->output()]);
    }

    public function acc(Request $request, string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
        $pengajuanSurat->status = 'Selesai';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil disetujui');
        return redirect(route('kades.pengajuan.index', $id));
    }

    public function rej(Request $request, string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();
        $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
        $pengajuanSurat->keterangan = $request->keterangan;
        $pengajuanSurat->status = 'Ditolak';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('kades.pengajuan.index', $id));
    }

    public function dashboard()
    {
        
        $ps = PengajuanSurat::get();
        $pskeluar = PengajuanSuratkeluar::get();
        return view('kades.dashboard', compact('ps', 'pskeluar'));
    }

    public function list()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Selesai', 'Expired'])
            ->latest()->get();

        return view('kades.pengajuan.list', compact('pengajuanSurat'));
    }

    public function reject()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Ditolak'])
            ->latest()->get();
        // dd($pengajuanSurat);

        return view('kades.pengajuan.reject', compact('pengajuanSurat'));
    }

    public function berkas($id)
    {
        // $selesaiStatus = PengajuanSurat::where('status', 'selesai')->orderBy('created_at', 'asc')->get();
        $selesaiStatus = PengajuanSurat::where('status', 'selesai')->orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);

        // Output indeks
        print_r($indeks[14]);
        // dd($selesaiStatus);
        return view('kades.pengajuan.s');
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('http://127.0.0.1:8000/cek/surat/' . $list->id);
        $pdf = Pdf::loadView('front.unduh', compact('list', 'user', 'qrCodes'))->setPaper('Legal', 'portrait');
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/temp/bubla.pdf', $content);
    }


    public function ttd(Request $request, $id)
    {
        if (Hash::check($request->ttd, Auth::user()->password)) {
            $pengajuan = PengajuanSurat::find($id);
            $pengajuan->status = "Selesai";
            $pengajuan->save();
        } else {
            return "salah";
        }

        Alert::success('Sukses!', 'Surat Berhasil Ditandatangani');
        return redirect()->route('kades.pengajuan.list');
    }

    public function tolak(String $id, Request $request)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $pengajuanSurat->keterangan = $request->keterangan;
        $pengajuanSurat->status = 'Ditolak';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('kades.pengajuan.reject'));
    }

    public function __datatable(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Dikonfirmasi']);
        // dd($query->get());

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

        // $pengajuanSurat = $query->latest()->first();
        // dd($pengajuanSurat);
        // dd($model['1']['product']);
        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $download_btn = '';
                $URL = route('kades.pengajuan.show', $model->id);

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

    public function __listDatatable(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Selesai', 'Expired']);

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

        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $detailSurat = $model->detail_surats->first();
                $actions = '';
                $URL = route('unduh.surat', ['id' => $model->id]);
                // View button
                // $viewURL = route('staff.pengajuan.show', $detailSurat->id);
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

    public function __listRejectDatatable(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Ditolak']);

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

        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $detailSurat = $model->detail_surats->first();
                $actions = '';
                $URL = route('unduh.surat', ['id' => $model->id]);
                // View button
                // $viewURL = route('staff.pengajuan.show', $detailSurat->id);
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
}
