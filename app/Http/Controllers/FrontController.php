<?php

namespace App\Http\Controllers;

use App\Models\Surat\DetailSurat;
use App\Models\Surat\PengajuanSurat;
use App\Models\Suratkeluar\DetailSuratkeluar;
use App\Models\Suratkeluar\PengajuanSuratkeluar;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\Facade\Pdfkeluar;
use Dompdf\Dompdf;
// use PDF;
// use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FrontController extends Controller
{
    public function cek($id)
    {
        $list = DetailSurat::where('id', $id)->first();
        $user = User::where('id', $list->users_id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();

        if (\Carbon\Carbon::parse($ps->created_at)->addMonth(1)->isPast()) {
            $list->berkas = null;
            $list->save();

            $ps->status = 'Expired';
            $ps->save();
        }

        // Tambahan untuk generate base64 PDF
        $qrCodes = \QrCode::size(120)->generate(url('/cek/surat/' . $list->id));
        $selesaiStatus = PengajuanSurat::orderBy('created_at', 'asc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);

        $pdf = Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'portrait');
        $pdfContent = base64_encode($pdf->output());

        return view('front.cek', compact('list', 'user', 'ps', 'pdfContent'));
    }

    public function cekkeluar($id)
    {
        $listkeluar = DetailSuratkeluar::where('id', $id)->first();
        $user = User::where('id', $listkeluar->users_id)->first();
        $pskeluar = PengajuanSuratkeluar::where('id', $listkeluar->pengajuan_suratkeluar_id)->first();
        // dd($list);

        if (\Carbon\Carbon::parse($pskeluar->created_at)->addMonth(1)->isPast()) {
            $listkeluar->berkassuratkeluar = null;
            $listkeluar->save();

            $pskeluar->status = 'Expired';
            $pskeluar->save();
        }

        return view('front.cekkeluar', compact('listkeluar', 'user', 'pskeluar'));
    }


    public function unduh($id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $list = DetailSurat::where('id', $id)->first();
        $ps = PengajuanSurat::where('id', $list->pengajuan_surat_id)->first();
        $selesaiStatus = PengajuanSurat::whereIn('status', ['Dikonfirmasi', 'Selesai', 'Ditolak'])->orderBy('created_at', 'desc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);

        $user = User::where('id', $list->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://silama.apk62.com/cek/surat/' . $list->id);
        $pdf = Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');
        if ($list->jenis_surat == 'Surat Keterangan Usaha') {
            return $pdf->stream('Surat Keterangan Usaha - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Keterangan Domisili') {
            return $pdf->stream('Surat Keterangan Domisili - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Keterangan Sakit') {
            return $pdf->stream('Surat Keterangan Sakit - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Keterangan Kematian') {
            return $pdf->stream('Surat Keterangan Kematian - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Keterangan Kepemilikan Kendaraan') {
            return $pdf->stream('Surat Keterangan Kepemilikan Kendaraan - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Keterangan Tidak Mampu') {
            return $pdf->stream('Surat Keterangan Tidak Mampu - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Keterangan Kelahiran') {
            return $pdf->stream('Surat Keterangan Kelahiran - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Pernyataan a') {
            return $pdf->stream('Surat Pernyataan a - ' . $list->nama . '.pdf');
        } else if ($list->jenis_surat == 'Surat Pernyataan b') {
            return $pdf->stream('Surat Pernyataan b - ' . $list->nama . '.pdf');
        }
    }


    public function unduhkeluar($id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $listkeluar = DetailSuratkeluar::where('id', $id)->first();
        $pskeluar = PengajuanSuratkeluar::where('id', $listkeluar->pengajuan_suratkeluar_id)->first();
        $selesaiStatus = PengajuanSuratkeluar::whereIn('status', ['Dikonfirmasi', 'Selesai', 'Ditolak'])->orderBy('created_at', 'desc')->pluck('id')->toArray();
        $indeks = array_flip($selesaiStatus);

        $user = User::where('id', $listkeluar->users_id)->first();
        $qrCodes = QrCode::size(120)->generate('https://silama.apk62.com/cekkeluar/surat/' . $listkeluar->id);
        $pdf = Pdf::loadView('front.unduhkeluar', compact('listkeluar', 'pskeluar', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');
        if ($listkeluar->jenis_surat == 'Surat Keterangan Usaha') {
            return $pdf->stream('Surat Keterangan Usaha - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Perintah Tugas') {
            return $pdf->stream('Surat Perintah Tugas - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Keterangan Kematian') {
            return $pdf->stream('Surat Keterangan Kematian - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Keterangan Kepemilikan Kendaraan') {
            return $pdf->stream('Surat Keterangan Kepemilikan Kendaraan - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Keterangan Tidak Mampu') {
            return $pdf->stream('Surat Keterangan Tidak Mampu - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Keterangan Kelahiran') {
            return $pdf->stream('Surat Keterangan Kelahiran - ' . $listkeluar->nama . '.pdf');
            //SURAT UNDANGAN
        } else if ($listkeluar->jenis_surat == 'Surat Undangan') {
            return $pdf->stream('Surat Undangan - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Undangan 5') {
            return $pdf->stream('Surat Undangan 5 - ' . $listkeluar->nama . '.pdf');
            //surat izin / rekomendasi
        } else if ($listkeluar->jenis_surat == 'Surat Izin Kepala Desa') {
            return $pdf->stream('Surat Izin Kepala Desa - ' . $listkeluar->nama . '.pdf');
            // SURAT PERNYATAAN
        } else if ($listkeluar->jenis_surat == 'Surat Pernyataan a') {
            return $pdf->stream('Surat Pernyataan a - ' . $listkeluar->nama . '.pdf');
        } else if ($listkeluar->jenis_surat == 'Surat Pernyataan b') {
            return $pdf->stream('Surat Pernyataan b - ' . $listkeluar->nama . '.pdf');
        }
    }


    public function qr()
    {
        $pdf = Pdf::loadView('front.pdf');
        return $pdf->setPaper('Legal', 'potrait')->stream('hello.pdf');
    }

    public function qrsuratkeluar()
    {
        $pdfsuratkeluar = Pdf::loadView('front.pdfsuratkeluar');
        return $pdfsuratkeluar->setPaper('Legal', 'potrait')->stream('hello.pdf');
    }

    // public function preview(){
    // return `<embed src='`. $pdf .`' width='100%' height='100%' />`;

    // $dompdf = new Dompdf(['pdfBackend' => 'GD']);
    // $dompdf->loadHtml("<h1>asu</h1>");
    // $dompdf->render();
    // $dompdf->stream("asu.pdf", array("Attachment" => false));
}
