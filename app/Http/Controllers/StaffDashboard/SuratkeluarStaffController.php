<?php

namespace App\Http\Controllers\StaffDashboard;

use App\Exports\ReportPengajuankeluar;
use App\Http\Controllers\Controller;
use App\Models\Suratkeluar\DetailSuratkeluar;
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

class SuratkeluarStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Diproses']);

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

        // If this is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pengajuanSuratkeluar,
                'html' => view('staff.pengajuankeluar.partials.pengajuankeluar-tablekeluar', compact('pengajuanSuratkeluar'))->render()
            ]);
        }

        return view('staff.pengajuankeluar.index', compact('pengajuanSuratkeluar'));
    }

    public function show(string $id)
    {
        // $detailSuratkeluar = DetailSuratkeluar::where('id', $id)->first();
        // $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $detailSuratkeluar->pengajuan_suratkeluar_id)->first();
        // $user = User::where('id', $pengajuanSuratkeluar->users_id)->first();
        // return view('staff.pengajuankeluar.show', compact('detailSurat', 'pengajuanSuratkeluar', 'user'));


        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $listkeluar = DetailSuratkeluar::where('id', $id)->first();
        $pskeluar = PengajuanSuratkeluar::where('id', $listkeluar->pengajuan_suratkeluar_id)->first();
        $selesaiStatus = PengajuanSuratkeluar::orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);
        $user = User::where('id', $listkeluar->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('http://127.0.0.1:8000/cekkeluar/suratkeluar/' . $listkeluar->id);
        $pdf = Pdf::loadView('front.unduhkeluar', compact('listkeluar', 'pskeluar', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');

        if ($listkeluar->jenis_surat == 'Surat Undangan') {
            return view('staff.pengajuankeluar.show', ['pdfContent' => $pdf->output(), 'pskeluar' => $pskeluar, 'listkeluar' => $listkeluar]);
        } else if ($listkeluar->jenis_surat == 'Surat Undangan 5') {
            return view('staff.pengajuankeluar.show', ['pdfContent' => $pdf->output(), 'pskeluar' => $pskeluar, 'listkeluar' => $listkeluar]);
        } else if ($listkeluar->jenis_surat == 'Surat Perintah Tugas') {
            return view('staff.pengajuankeluar.show', ['pdfContent' => $pdf->output(), 'pskeluar' => $pskeluar, 'listkeluar' => $listkeluar]);

        }
    }

     public function confirmkeluar(Request $request, string $id)
    {
        $detailSuratkeluar = DetailSuratkeluar::where('id', $id)->first();

        if ($request->status == 'Dikonfirmasi') {
            $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $detailSuratkeluar->pengajuan_suratkeluar_id)->first();
            $pengajuanSuratkeluar->status = 'Dikonfirmasi';
            $pengajuanSuratkeluar->save();
            Alert::success('Sukses!', 'Surat Berhasil disetujui');
            return redirect(route('staff.pengajuankeluar.index', $id));
        } elseif ($request->status == 'Ditolak') {
            $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $detailSuratkeluar->pengajuan_suratkeluar_id)->first();
            $pengajuanSuratkeluar->keterangan = $request->keterangan;
            $pengajuanSuratkeluar->status = 'Ditolak';
            $pengajuanSuratkeluar->save();
            Alert::success('Sukses!', 'Surat Berhasil ditolak');
            return redirect(route('staff.pengajuankeluar.index', $id));
        }
    }

    public function dashboard()
    {
        $pskeluar = PengajuanSuratkeluar::get();
        $pskeluar = PengajuanSuratkeluar::get();
        return view('staff.dashboard', compact('pskeluar', 'pskeluar'));
    }

    public function listkeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Dikonfirmasi', 'Ditolak', 'Selesai', 'Expired']);

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

        // If this is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $pengajuanSuratkeluar,
                'html' => view('staff.pengajuankeluar.partials.list-tablekeluar', compact('pengajuanSuratkeluar'))->render()
            ]);
        }

        return view('staff.pengajuankeluar.listkeluar', compact('pengajuanSuratkeluar'));
    }

    public function rejectkeluar()
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Ditolak'])
            ->latest()->get();
        // dd($pengajuanSuratkeluar);

        return view('staff.pengajuankeluar.rejectkeluar', compact('pengajuanSuratkeluar'));
    }


    public function berkassuratkeluar($id)
    {
        // Cari detail surat berdasarkan ID
        $detailSuratkeluar = DetailSuratkeluar::find($id);

        // Cek apakah data ditemukan
        if (!$detailSuratkeluar || !$detailSuratkeluar->berkassuratkeluar) {
            // Jika data tidak ditemukan atau berkassuratkeluar null, redirect ke route 'staff.pengajuankeluar.listkeluar'
            return redirect()->route('staff.pengajuankeluar.listkeluar')->with('error', 'Data tidak ditemukan atau berkassuratkeluar kosong.');
        }

        // Unduh berkassuratkeluar menggunakan response()->download()
        return response()->download(storage_path('app/public/' . $detailSuratkeluar->berkassuratkeluar));
    }

    public function downloadReportkeluar(Request $request)
    {
        $now = Carbon::now()->format('d-m-Y');

        // dd($request->all());
        // $nik = $request->get('nik');
        // $jenis_surat = $request->get('jenis_surat');

        $query = PengajuanSuratkeluar::whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])
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
        // dd($query->get());
        $filename = 'report_pengajuankeluar_' . $now;
        return Excel::download(new ReportPengajuankeluar($query->get(), []), "$filename.xlsx");

        //        $this->reportorderService->generateReportUsage($dataReport);
        //        return Excel::download(new ReportLimitUsage($dataReport), "$filename.xlsx");



    }

    public function __datatablekeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Diproses']);
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
                $URL = route('staff.pengajuankeluar.show', $model->id);

                // Check if the status of the model is 'Selesai' (Completed)
                if ($model->status == 'Diproses') {
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


    public function tolakkeluar(String $id, Request $request)
    {
        $pengajuanSuratkeluar = PengajuanSuratkeluar::where('id', $id)->first();
        $pengajuanSuratkeluar->keterangan = $request->keterangan;
        $pengajuanSuratkeluar->status = 'Ditolak';
        $pengajuanSuratkeluar->save();
        Alert::success('Sukses!', 'Surat Berhasil ditolak');
        return redirect(route('staff.pengajuankeluar.rejectkeluar'));
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
                // $viewURL = route('staff.pengajuankeluar.show', $detailSuratkeluar->id);
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

                // Download berkassuratkeluar if available
                // if ($detailSuratkeluar->berkassuratkeluar) {
                //     $berkasURL = route('staff.pengajuankeluar.berkassuratkeluar', $detailSuratkeluar->id);
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

    public function __listDatatablekeluar(Request $request)
    {
        $query = PengajuanSuratkeluar::with(['users', 'detail_suratkeluars'])
            ->whereIn('status', ['Dikonfirmasi', 'Ditolak', 'Selesai', 'Expired']);

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
            ->addColumn('operator', function ($model) {
                return $model->users->name ?? '-';
            })
            ->addColumn('nama_pengaju', function ($model) {
                $detailSuratkeluar = $model->detail_suratkeluars->first();
                return $detailSuratkeluar->nama ?? '-';
            })
            ->addColumn('nik_pengaju', function ($model) {
                $detailSuratkeluar = $model->detail_suratkeluars->first();
                return $detailSuratkeluar->nik ?? '-';
            })
            ->addColumn('jenis_surat', function ($model) {
                $detailSuratkeluar = $model->detail_suratkeluars->first();
                return $detailSuratkeluar->jenis_surat ?? '-';
            })
            ->addColumn('status', function ($model) {
                return $model->status;
            })
            ->addColumn('keterangan', function ($model) {
                return $model->keterangan ?? '';
            })
            ->addColumn('action', function ($model) {
                $detailSuratkeluar = $model->detail_suratkeluars->first();
                $actions = '';

                // View button
                // $viewURL = route('staff.pengajuankeluar.show', $detailSuratkeluar->id);
                // $actions .= "<a class='btn btn-icon btn-primary mr-1 mb-1' href='{$viewURL}'
                //             data-toggle='tooltip' data-placement='top' title='Lihat Detail'>
                //                 <i class='dw dw-eye' style='font-size: 2vh !important;'></i>
                //             </a>";

                // Download button for completed letters
                if ($model->status == 'Selesai') {
                    $URL = route('unduhkeluar.suratkeluar', ['id' => $model->id]);
                    $actions .= "<a class='btn btn-icon btn-success mr-1 mb-1' href='$URL' target='_blank'
                                data-toggle='tooltip' data-placement='top' title='Download Surat'>
                                    <i class='dw dw-download' style='font-size: 2vh !important;'></i>
                                </a>";
                }

                // Download berkassuratkeluar if available
                // if ($detailSuratkeluar->berkassuratkeluar) {
                //     $berkasURL = route('staff.pengajuankeluar.berkassuratkeluar', $detailSuratkeluar->id);
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
