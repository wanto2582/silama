<?php

namespace App\Http\Controllers\StaffDashboard;

use App\Exports\ReportPengajuan;
use App\Exports\ReportPengajuankeluar;
use App\Http\Controllers\Controller;
use App\Models\Surat\DetailSurat;
use App\Models\Suratkeluar\DetailSuratkeluar;
use App\Models\Surat\PengajuanSurat;
use App\Models\Suratkeluar\PengajuanSuratkeluar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Diproses']);

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

        // If this is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pengajuanSurat,
                'html' => view('staff.pengajuan.partials.pengajuan-table', compact('pengajuanSurat'))->render()
            ]);
        }

        return view('staff.pengajuan.index', compact('pengajuanSurat'));
    }

    public function show(string $id)
    {
        // $detailSurat = DetailSurat::where('id', $id)->first();
        // $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
        // $user = User::where('id', $pengajuanSurat->users_id)->first();
        // return view('staff.pengajuan.show', compact('detailSurat', 'pengajuanSurat', 'user'));


        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        $selesaiStatus = PengajuanSurat::orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://silama.apk62.com/cek/surat/' . $list->id);
        $pdf = Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');

        // SURAT KETERANGAN
        if ($list->jenis_surat == 'Surat Keterangan Usaha') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Kepemilikan Kendaraan') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Sakit') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Domisili') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Kematian') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Tidak Mampu') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Keterangan Kelahiran') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
            // LAYOUTE SURAT KETERANGAN
        } else if ($list->jenis_surat == 'Layoute Surat Keterangan') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);


            // SURAT IZIN / REKOMENDASI
        } else if ($list->jenis_surat == 'Surat Izin Kepala Desa') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Rekomendasi') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
         } else if ($list->jenis_surat == 'Surat Izin') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);


            // SURAT PERNYATAAN
        } else if ($list->jenis_surat == 'Surat Pernyataan') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);
        } else if ($list->jenis_surat == 'Surat Pernyataan b') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);

         // SURAT PENGANTAR
        } else if ($list->jenis_surat == 'Surat Pengantar') {
            return view('staff.pengajuan.show', ['pdfContent' => $pdf->output(), 'ps' => $ps, 'list' => $list]);



        }
    }

    public function confirm(Request $request, string $id)
    {
        $detailSurat = DetailSurat::where('id', $id)->first();

        if ($request->status == 'Dikonfirmasi') {
            $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
            $pengajuanSurat->status = 'Dikonfirmasi';
            $pengajuanSurat->save();
            Alert::success('Sukses!', 'Surat Berhasil disetujui');
            return redirect(route('staff.pengajuan.index', $id));
        } elseif ($request->status == 'Ditolak') {
            $pengajuanSurat = PengajuanSurat::where('id', $detailSurat->pengajuan_surat_id)->first();
            $pengajuanSurat->keterangan = $request->keterangan;
            $pengajuanSurat->status = 'Ditolak';
            $pengajuanSurat->save();
            Alert::success('Sukses!', 'Surat Berhasil ditolak');
            return redirect(route('staff.pengajuan.index', $id));
        }
    }

    public function dashboard()
    {
        $ps = PengajuanSurat::get();
        $pskeluar = PengajuanSuratkeluar::get();
        return view('staff.dashboard', compact('ps', 'pskeluar'));
    }

    public function list(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Dikonfirmasi', 'Ditolak', 'Selesai', 'Expired']);

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

        // If this is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pengajuanSurat,
                'html' => view('staff.pengajuan.partials.list-table', compact('pengajuanSurat'))->render()
            ]);
        }

        return view('staff.pengajuan.list', compact('pengajuanSurat'));
    }

    public function reject()
    {
        $pengajuanSurat = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Ditolak'])
            ->latest()->get();
        // dd($pengajuanSurat);

        return view('staff.pengajuan.reject', compact('pengajuanSurat'));
    }


    public function berkas($id)
    {
        // Cari detail surat berdasarkan ID
        $detailSurat = DetailSurat::find($id);

        // Cek apakah data ditemukan
        if (!$detailSurat || !$detailSurat->berkas) {
            // Jika data tidak ditemukan atau berkas null, redirect ke route 'staff.pengajuan.list'
            return redirect()->route('staff.pengajuan.list')->with('error', 'Data tidak ditemukan atau berkas kosong.');
        }

        // Unduh berkas menggunakan response()->download()
        return response()->download(storage_path('app/public/' . $detailSurat->berkas));
    }

    public function downloadReport(Request $request)
    {
        $now = Carbon::now()->format('d-m-Y');

        // dd($request->all());
        // $nik = $request->get('nik');
        // $jenis_surat = $request->get('jenis_surat');

        $query = PengajuanSurat::whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
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
        // dd($query->get());
        $filename = 'report_pengajuan_' . $now;
        return Excel::download(new ReportPengajuan($query->get(), []), "$filename.xlsx");

        //        $this->reportorderService->generateReportUsage($dataReport);
        //        return Excel::download(new ReportLimitUsage($dataReport), "$filename.xlsx");



    }

    public function __datatable(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Diproses']);
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
                $URL = route('staff.pengajuan.show', $model->id);

                // Check if the status of the model is 'Selesai' (Completed)
                if ($model->status == 'Diproses') {
                    // If status is 'Selesai', generate the download button HTML
                    $download_btn = "
                        <a class='btn btn-icon btn-primary mr-1 mb-1' href='$URL'
                        data-toggle='tooltip' data-placement='top' title='Lihat Surat' id='download-button' style='width:32px;height:25px;padding:0; data-name='$model->name' data-id='$model->id'>
                            <i class='dw dw-eye' style='font-size:1.2rem;'></i>
                        </a>";

                        // <a class='btn btn-icon btn-success mr-1 mb-1 d-flex align-items-center justify-content-center' style='width:32px;height:32px;padding:0;' href='$URL' target='_blank'
                        //         data-toggle='tooltip' data-placement='top' title='Download Surat'>
                        //             <i class='dw dw-download' style='font-size:1.2rem;'></i>
                        //         </a>
                }


                $action = $download_btn;
                return $action;
            })
            ->make(true);
        return $data;
    }


    public function tolak(String $id, Request $request)
    {
        $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
        $pengajuanSurat->keterangan = $request->keterangan;
        $pengajuanSurat->status = 'Ditolak';
        $pengajuanSurat->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('staff.pengajuan.reject'));
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

    public function __listDatatable(Request $request)
    {
        $query = PengajuanSurat::with(['users', 'detail_surats'])
            ->whereIn('status', ['Dikonfirmasi', 'Ditolak', 'Selesai', 'Expired']);

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

        $data = DataTables::of($query)->addIndexColumn()
            ->addColumn('operator', function ($model) {
                return $model->users->name ?? '-';
            })
            ->addColumn('nama_pengaju', function ($model) {
                $detailSurat = $model->detail_surats->first();
                return $detailSurat->nama ?? '-';
            })
            ->addColumn('nik_pengaju', function ($model) {
                $detailSurat = $model->detail_surats->first();
                return $detailSurat->nik ?? '-';
            })
            ->addColumn('jenis_surat', function ($model) {
                $detailSurat = $model->detail_surats->first();
                return $detailSurat->jenis_surat ?? '-';
            })
            ->addColumn('status', function ($model) {
                return $model->status;
            })
            ->addColumn('keterangan', function ($model) {
                return $model->keterangan ?? '';
            })
            ->addColumn('action', function ($model) {
                $detailSurat = $model->detail_surats->first();
                $actions = '';

                // View button
                // $viewURL = route('staff.pengajuan.show', $detailSurat->id);
                // $actions .= "<a class='btn btn-icon btn-primary mr-1 mb-1' href='{$viewURL}'
                //             data-toggle='tooltip' data-placement='top' title='Lihat Detail'>
                //                 <i class='dw dw-eye' style='font-size: 2vh !important;'></i>
                //             </a>";

                // Download button for completed letters
                if ($model->status == 'Selesai') {
                    $URL = route('unduh.surat', ['id' => $model->id]);
                    $actions .= "<a class='btn btn-icon btn-success mr-1 mb-1 d-flex align-items-center justify-content-center' style='width:32px;height:32px;padding:0;' href='$URL' target='_blank'
                                data-toggle='tooltip' data-placement='top' title='Download Surat'>
                                    <i class='dw dw-download' style='font-size:1.2rem;'></i>
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
