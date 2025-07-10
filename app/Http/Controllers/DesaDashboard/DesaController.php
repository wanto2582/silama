<?php

namespace App\Http\Controllers\DesaDashboard;

use App\Http\Controllers\Controller;
use App\Models\DataWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $suratmu = Auth::user()->pengajuan_surats()->with('detail_surats')->latest()->first();
        return view('desa.dashboard', compact('suratmu'));
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
}
