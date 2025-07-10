<?php

namespace App\Http\Controllers\DesaDashboard;

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
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Browsershot\Browsershot;
use Yajra\DataTables\Facades\DataTables;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $dataWarga = DataWarga::latest()->get();

        return view('desa.warga.index', compact('dataWarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desa.warga.form', [
            'user' => new User(),
            'metapage' => [
                'title' => 'Buat User Baru',
                'url' => route('desa.warga.store'),
                'method' => 'POST',
                'button' => 'Create'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'nama' => $request->name,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->gender,
            'tempat_lahir' => $request->born_place,
            'tgl_lahir' => $request->born_date,
            'agama' => $request->religion,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'status_pernikahan' => $request->status_pernikahan,
            'desa' => $request->dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ];

        $warga = DataWarga::create($data);

        Alert::success('Sukses!', 'Data Berhasil Dibuat');
        return redirect()->route('desa.warga.index');
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
        $detailWarga = DataWarga::where('id', $id)->first();
        // dd($detailWarga);
        return view('desa.warga.edit', compact('detailWarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $detailWarga = DataWarga::where('id', $id)->first();

        DataWarga::where('id', $id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'status_pernikahan' => $request->status_pernikahan,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        Alert::success('Sukses!', 'Data Berhasil DiEdit');
        return redirect()->route('desa.warga.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
    //     $detailSurat = DetailSurat::where('pengajuan_surat_id', $id)->first();
    //     $get_berkas = $detailSurat->berkas;
    //     $data = 'storage/' . $get_berkas;
    //     if (File::exists($data)) {
    //         File::delete($data);
    //     } else {
    //         File::delete('storage/app/public/' . $get_berkas);
    //     }
    //     $pengajuanSurat->delete();
    //     $detailSurat->delete();
    //     Alert::success('Sukses!', 'Surat Berhasil Dihapus');
    //     return redirect()->route('desa.surat.riwayat');
    // }

    // public function pdf(String $id)
    // {
    //     Carbon::setLocale('id');
    //     $list = DetailSurat::where('id', $id)->first();
    //     $user = User::where('id', $list->users_id)->first();
    //     $pdf = Pdf::loadView('desa.surat.pdf', compact('list', 'user'))->setPaper('a4', 'potrait');
    //     return $pdf->download('surat.pdf');

    // }

    // public function riwayat()
    // {
    //     $pengajuanSurat = PengajuanSurat::where('users_id', Auth::user()->id)->whereIn('status', ['Diproses', 'Dikonfirmasi', 'Selesai', 'Ditolak', 'Expired'])->with('detail_surats')->latest()->get();

    //     return view('desa.surat.riwayat', compact('pengajuanSurat'));
    // }

    // public function draft()
    // {
    //     $pengajuanSurat = PengajuanSurat::where('users_id', Auth::user()->id)->where('status', 'Draft')->with('detail_surats')->get();
    //     return view('desa.surat.draft', compact('pengajuanSurat'));
    // }

    // public function berkas($id)
    // {
    //     $berkas = DetailSurat::where('id', $id)->first();
    //     return response()->download(storage_path("app/public/$berkas->berkas"));
    // }

    // public function send($id)
    // {
    //     $pengajuanSurat = PengajuanSurat::where('id', $id)->first();
    //     $pengajuanSurat->update([
    //         'status' => 'Diproses',
    //     ]);
    //     Alert::success('Sukses!', 'Surat Berhasil Dikirim');
    //     return redirect()->route('desa.surat.riwayat');
    // }


     public function destroy(Request $request, string $id)
    {
        try {
            // Find warga by ID
            $dataWarga = DataWarga::findOrFail($id);

            // Delete file if exists
            if ($dataWarga->file) {
                $filePath = 'storage/' . $dataWarga->file;
                if (File::exists($filePath)) {
                    File::delete($filePath);
                } else {
                    File::delete('storage/app/public/' . $dataWarga->file);
                }
            }

            // Delete record from database
            $dataWarga->delete();

            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Warga berhasil dihapus!'
                ]);
            }

            Alert::success('Sukses!', 'Warga Berhasil Dihapus');
            return redirect()->route('desa.warga.index');
        } catch (\Exception $e) {
            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus warga: ' . $e->getMessage()
                ], 500);
            }

            Alert::error('Error!', 'Gagal menghapus Warga: ' . $e->getMessage());
            return redirect()->route('desa.warga.index');
        }
    }



 public function __datatable_warga(Request $request)
    {
        $query = dataWarga::latest();

        return DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $download_btn = '';
                $edit_btn = '';
                $delete_btn = '';

                // Download button (jika ada file)
                if ($model->file) {
                    $downloadURL = asset('storage/' . $model->file);
                    $download_btn = "
                        <a class='btn btn-icon btn-primary mr-1 mb-1' href='$downloadURL' target='_blank'
                        data-toggle='tooltip' data-placement='top' title='Download File'>
                            <i class='icon-copy bi bi-download' style='font-size: 2vh !important;'></i>
                        </a>";
                }

                // Edit button
                $editURL = route('desa.warga.edit', $model->id);
                $edit_btn = "
                    <a class='btn btn-icon btn-warning mr-1 mb-1' href='$editURL'
                    data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='icon-copy bi bi-pencil' style='font-size: 2vh !important;'></i>
                    </a>";

                // Delete button
                $delete_btn = "
                    <button class='btn btn-icon btn-danger delete-btn'
                    data-id='$model->id' data-nama='$model->nama'
                    data-toggle='tooltip' data-placement='top' title='Delete'>
                        <i class='icon-copy bi bi-trash' style='font-size: 2vh !important;'></i>
                    </button>";

                $action = $download_btn . $edit_btn . $delete_btn;
                return $action;
            })
            ->make(true);
    }
}
