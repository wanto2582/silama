<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    public function show($id)
    {
        $detailWarga = DataWarga::find($id);

        if (!$detailWarga) {
            abort(404, 'Data warga tidak ditemukan.');
        }

        return view('idcard.show', compact('detailWarga'));
    }

    public function index()
    {
        $detailWarga = DataWarga::all(); // Ambil semua data warga
        return view('idcard.index', compact('detailWarga'));
    }
}