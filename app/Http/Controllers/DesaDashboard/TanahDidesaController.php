<?php

namespace App\Http\Controllers\DesaDashboard;

use App\Http\Controllers\Controller;
use App\Models\TanahDidesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; // Pastikan ini diimpor
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TanahDidesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanahDidesa = TanahDidesa::latest()->get();

        return view('desa.tanah_didesa.index', compact('tanahDidesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desa.tanah_didesa.form', [
            'tanahDidesa' => new TanahDidesa(),
            'metapage' => [
                'title' => 'Tambah File',
                'url' => route('desa.tanah-didesa.store'),
                'method' => 'POST',
                'button' => 'Add'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi file PDF saat upload
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'nama_kades' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:20480', // Hanya PDF, max 20MB
        ]);

        $data = [
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'perihal' => $request->perihal,
            'nama_kades' => $request->nama_kades,
            // Simpan file ke disk 'public' dalam folder 'assets/tanah_didesa'
            'file' => $request->file('file')->store('assets/tanah_didesa', 'public'),
        ];

        TanahDidesa::create($data);

        Alert::success('Sukses!', 'Data Berhasil Dibuat');
        return redirect()->route('desa.tanah-didesa.index');
    }

    
        public function show(string $id)
            {
        $tanahDidesa = TanahDidesa::findOrFail($id);

         // Ini akan langsung menampilkan PDF di browser
        if ($tanahDidesa->file && Storage::disk('public')->exists($tanahDidesa->file)) {
        $filePath = Storage::disk('public')->path($tanahDidesa->file);
        return response()->file($filePath);
        }

         Alert::error('Error!', 'File tidak ditemukan atau rusak.');
         return redirect()->back();
        }
    


    
    public function edit(string $id)
    {
        $detailSurat = TanahDidesa::where('id', $id)->first();
        return view('desa.tanah_didesa.edit', compact('detailSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detailSurat = TanahDidesa::where('id', $id)->first();

        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'nama_kades' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:20480', // File opsional untuk update
        ]);

        $filePath = $detailSurat->file; // Path file lama

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            // Simpan file baru
            $filePath = $request->file('file')->store('assets/tanah_didesa', 'public');
        }

        // Update data di database
        $detailSurat->update([
            'nama' => $request->nama,
            'perihal' => $request->perihal,
            'nama_kades' => $request->nama_kades,
            'tahun' => $request->tahun,
            'file' => $filePath, // Gunakan path file baru atau path file lama
        ]);

        Alert::success('Sukses!', 'Data Berhasil DiEdit');
        return redirect()->route('desa.tanah-didesa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            // Find dokumen aparatur kades by ID
            $tanahDidesa = TanahDidesa::findOrFail($id);

            // Delete file if exists
            if ($tanahDidesa->file) {
                // Gunakan Storage::disk('public')->delete() untuk menghapus file
                if (Storage::disk('public')->exists($tanahDidesa->file)) {
                    Storage::disk('public')->delete($tanahDidesa->file);
                }
            }

            // Delete record from database
            $tanahDidesa->delete();

            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Dokumen berhasil dihapus!'
                ]);
            }

            Alert::success('Sukses!', 'Dokumen Berhasil Dihapus');
            return redirect()->route('desa.tanah-didesa.index');
        } catch (\Exception $e) {
            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus dokumen : ' . $e->getMessage()
                ], 500);
            }

            Alert::error('Error!', 'Gagal menghapus dokumen : ' . $e->getMessage());
            return redirect()->route('desa.tanah-didesa.index');
        }
    }

    public function __datatable_tanah_didesa(Request $request)
    {
        $query = TanahDidesa::latest();

        return DataTables::of($query)->addIndexColumn()
            ->addColumn('action', function ($model) {
                $view_btn = ''; // Tombol View
                $download_btn = '';
                $edit_btn = '';
                $delete_btn = '';

                // Tombol View (jika ada file)
                if ($model->file) {
                    $viewURL = route('desa.tanah-didesa.show', $model->id);
                    $view_btn = "
                        <a class='btn btn-icon btn-info mr-1 mb-1' href='$viewURL' target='_blank'
                        data-toggle='tooltip' data-placement='top' title='View File'>
                            <i class='icon-copy bi bi-eye' style='font-size: 2vh !important;'></i>
                        </a>";
                }

                // Download button (jika ada file)
                if ($model->file) {
                    // Untuk download, kita bisa langsung menggunakan asset() karena file ada di public storage
                    $downloadURL = asset('storage/' . $model->file);
                    $download_btn = "
                        <a class='btn btn-icon btn-primary mr-1 mb-1' href='$downloadURL' download
                        data-toggle='tooltip' data-placement='top' title='Download File'>
                            <i class='icon-copy bi bi-download' style='font-size: 2vh !important;'></i>
                        </a>";
                }

                // Edit button
                $editURL = route('desa.tanah-didesa.edit', $model->id);
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

                $action = $view_btn . $download_btn . $edit_btn . $delete_btn;
                return $action;
            })
            ->make(true);
    }
}