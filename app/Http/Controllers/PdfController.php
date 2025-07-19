<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PdfController extends Controller
{
    public function showPublicPdf($filename)
    {
        $path = 'dokumen/' . $filename; // Sesuaikan dengan path di storage/app/public

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File PDF tidak ditemukan.');
        }

        // Menggunakan response()->file() untuk menampilkan PDF langsung di browser
        // atau response()->download() untuk memaksa download
        return response()->file(Storage::disk('public')->path($path));

        // Atau jika Anda ingin lebih eksplisit dengan header:
        // $file = Storage::disk('public')->get($path);
        // return new StreamedResponse(function () use ($file) {
        //     echo $file;
        // }, 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $filename . '"',
        // ]);
    }
}