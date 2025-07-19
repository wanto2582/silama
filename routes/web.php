<?php

use App\Http\Controllers\AdminDashboard\AdminController;
use App\Http\Controllers\AdminDashboard\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KadesDashboard\KadesController;
use App\Http\Controllers\KadesDashboard\KadeskeluarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffDashboard\StaffController;
use App\Http\Controllers\StaffDashboard\SuratkeluarStaffController;
use App\Http\Controllers\DesaDashboard\SuratController;
use App\Http\Controllers\DesaDashboard\SuratkeluarController;
use App\Http\Controllers\DesaDashboard\DesaController;
use App\Http\Controllers\DesaDashboard\SuratMasukController;
use App\Http\Controllers\DesaDashboard\AparaturPemdesController;
use App\Http\Controllers\DesaDashboard\PeraturanDesaController;
use App\Http\Controllers\DesaDashboard\PeraturanKadesController;
use App\Http\Controllers\DesaDashboard\PeraturanBerkadesController;
use App\Http\Controllers\DesaDashboard\KeputusanKadesController;
use App\Http\Controllers\DesaDashboard\LembarDesaController;
use App\Http\Controllers\DesaDashboard\NotulenMusdesController;
use App\Http\Controllers\DesaDashboard\TanahDidesaController;
use App\Http\Controllers\DesaDashboard\TanahKasdesaController;
use App\Http\Controllers\DesaDashboard\WargaController;
use App\Models\AparaturPemdes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController; // Pastikan Anda mengimpor controller
Route::get('/preview-surat/{filename}', [PdfController::class, 'showPublicPdf'])->name('public.pdf.show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cek/surat/{id}', [FrontController::class, 'cek'])->name('cek.surat');
Route::get('/download/surat/{id}', [FrontController::class, 'unduh'])->name('unduh.surat');
Route::get('/preview/surat', [FrontController::class, 'preview'])->name('preview.surat');
Route::get('/cekkeluar/suratkeluar/{id}', [FrontController::class, 'cekkeluar'])->name('cekkeluar.suratkeluar');
Route::get('/downloadkeluar/suratkeluar/{id}', [FrontController::class, 'unduhkeluar'])->name('unduhkeluar.suratkeluar');
Route::get('/previewkeluar/suratkeluar', [FrontController::class, 'previewkeluar'])->name('previewkeluar.suratkeluar');
Route::get('/qr', [FrontController::class, 'qr'])->name('qr');
Route::get('/qrkeluar', [FrontController::class, 'qrkeluar'])->name('qrkeluar');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//kades
Route::middleware(['auth', 'verified', 'role:kades'])->group(function () {
    Route::get('kades', [KadesController::class, 'dashboard'])->name('kades.dashboard');
    Route::get('kades/list', [KadesController::class, 'list'])->name('kades.pengajuan.list');
    Route::get('kades/reject', [KadesController::class, 'reject'])->name('kades.pengajuan.reject');
    Route::get('kades/berkas/{id}', [KadesController::class, 'berkas'])->name('kades.pengajuan.berkas');
    Route::put('kades/pengajuan/acc/{id}', [KadesController::class, 'acc'])->name('kades.pengajuan.acc');
    Route::put('kades/pengajuan/rej/{id}', [KadesController::class, 'rej'])->name('kades.pengajuan.rej');
    Route::post('kades/ttd/{id}', [KadesController::class, 'ttd'])->name('kades.pengajuan.ttd');
    Route::post('kades/tolak/{id}', [KadesController::class, 'tolak'])->name('kades.pengajuan.tolak');
    Route::get('kades/datatable.json', [KadesController::class, '__datatable'])->name('kades.pengajuan.list_table');
    Route::get('kades/list-datatable.json', [KadesController::class, '__listDatatable'])->name('kades.pengajuan.list_datatable');
    Route::get('kades/list-reject-datatable.json', [KadesController::class, '__listRejectDatatable'])->name('kades.pengajuan.reject_datatable');
    Route::resource('kades/pengajuan', KadesController::class)->names([
        'index' => 'kades.pengajuan.index',
        'create' => 'kades.pengajuan.create',
        'store' => 'kades.pengajuan.store',
        'show' => 'kades.pengajuan.show',
        'edit' => 'kades.pengajuan.edit',
        'update' => 'kades.pengajuan.update',
        'destroy' => 'kades.pengajuan.destroy'
    ]);
    Route::get('kades/listkeluar', [KadeskeluarController::class, 'listkeluar'])->name('kades.pengajuankeluar.listkeluar');
    Route::get('kades/rejectkeluar', [KadeskeluarController::class, 'rejectkeluar'])->name('kades.pengajuankeluar.rejectkeluar');
    Route::get('kades/berkassuratkeluar/{id}', [KadeskeluarController::class, 'berkassuratkeluar'])->name('kades.pengajuankeluar.berkassuratkeluar');
    Route::put('kades/pengajuankeluar/acckeluar/{id}', [KadeskeluarController::class, 'acckeluar'])->name('kades.pengajuankeluar.acckeluar');
    Route::put('kades/pengajuankeluar/rejkeluar/{id}', [KadeskeluarController::class, 'rejkeluar'])->name('kades.pengajuankeluar.rejkeluar');
    Route::post('kades/ttdkeluar/{id}', [KadeskeluarController::class, 'ttdkeluar'])->name('kades.pengajuankeluar.ttdkeluar');
    Route::post('kades/tolakkeluar/{id}', [KadeskeluarController::class, 'tolakkeluar'])->name('kades.pengajuankeluar.tolakkeluar');
    Route::get('kades/datatablekeluar.json', [KadeskeluarController::class, '__datatablekeluar'])->name('kades.pengajuankeluar.list_tablekeluar');
    Route::get('kades/listkeluar-datatablekeluar.json', [KadeskeluarController::class, '__listDatatablekeluar'])->name('kades.pengajuankeluar.listkeluar_datatablekeluar');
    //list ditolak
    Route::get('kades/listkeluar-reject-datatablekeluar.json', [KadeskeluarController::class, '__listRejectDatatablekeluar'])->name('kades.pengajuankeluar.rejectkeluar_datatablekeluar');
    Route::resource('kades/pengajuankeluar', KadeskeluarController::class)->names([
        'index' => 'kades.pengajuankeluar.index',
        'create' => 'kades.pengajuankeluar.create',
        'store' => 'kades.pengajuankeluar.store',
        'show' => 'kades.pengajuankeluar.show',//pengajuankeluar
        'edit' => 'kades.pengajuankeluar.edit',
        'update' => 'kades.pengajuankeluar.update',
        'destroy' => 'kades.pengajuankeluar.destroy'
    ]);
});

// Admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('admin', AdminController::class)->name('admin.dashboard');
    Route::resource('admin/users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy'
    ]);
});

Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
    Route::get('staff', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('staff/list', [StaffController::class, 'list'])->name('staff.pengajuan.list');
    Route::get('/staff/pengajuan/list-table', [StaffController::class, 'listTable'])->name('staff.pengajuan.list_table');
    Route::get('staff/reject', [StaffController::class, 'reject'])->name('staff.pengajuan.reject');
    Route::get('staff/berkas/{id}', [StaffController::class, 'berkas'])->name('staff.pengajuan.berkas');
    Route::put('staff/pengajuan/{id}', [StaffController::class, 'confirm'])->name('staff.pengajuan.confirm');
    Route::get('staff/datatable.json', [StaffController::class, '__datatable'])->name('staff.pengajuan.list_table');
    Route::get('staff/list-datatable.json', [StaffController::class, '__listDatatable'])->name('staff.pengajuan.list_datatable');
    Route::get('staff/list-reject-datatable.json', [StaffController::class, '__listRejectDatatable'])->name('staff.pengajuan.reject_datatable');
    Route::get('staff/list-download', [StaffController::class, 'downloadReport'])->name('staff.pengajuan.list_download');
    Route::resource('staff/pengajuan', StaffController::class)->names([
        'index' => 'staff.pengajuan.index',
        'create' => 'staff.pengajuan.create',
        'store' => 'staff.pengajuan.store',
        'show' => 'staff.pengajuan.show',
        'edit' => 'staff.pengajuan.edit',
        'update' => 'staff.pengajuan.update',
        'destroy' => 'staff.pengajuan.destroy'
    ]);
    Route::get('staff/listkeluar', [SuratkeluarStaffController::class, 'listkeluar'])->name('staff.pengajuankeluar.listkeluar');
    Route::get('staff/rejectkeluar', [SuratkeluarStaffController::class, 'rejectkeluar'])->name('staff.pengajuankeluar.rejectkeluar');
    Route::get('staff/berkassuratkeluar/{id}', [SuratkeluarStaffController::class, 'berkassuratkeluar'])->name('staff.pengajuankeluar.berkassuratkeluar');
    Route::put('staff/pengajuankeluar/{id}', [SuratkeluarStaffController::class, 'confirmkeluar'])->name('staff.pengajuankeluar.confirmkeluar');
    Route::get('staff/datatablekeluar.json', [SuratkeluarStaffController::class, '__datatablekeluar'])->name('staff.pengajuankeluar.listkeluar_tablekeluar');
    //table lis surat keluar
    // Route::get('/staff/pengajuankeluar/list-tablekeluar', [SuratkeluarStaffController::class, 'listTablekeluar'])->name('staff.pengajuankeluar.listkeluar_tablekeluar');
    Route::get('staff/list-datatablekeluar.json', [SuratkeluarStaffController::class, '__listDatatablekeluar'])->name('staff.pengajuankeluar.listkeluar_datatablekeluar');
    Route::get('staff/list-reject-datatablekeluar.json', [SuratkeluarStaffController::class, '__listRejectDatatablekeluar'])->name('staff.pengajuankeluar.reject_datatablekeluar');
    Route::get('staff/list-downloadkeluar', [SuratkeluarStaffController::class, 'downloadReportkeluar'])->name('staff.pengajuankeluar.listkeluar_downloadkeluar');
    Route::resource('staff/pengajuankeluar', SuratkeluarStaffController::class)->names([
        'index' => 'staff.pengajuankeluar.index',
        'create' => 'staff.pengajuankeluar.create',
        'store' => 'staff.pengajuankeluar.store',
        'show' => 'staff.pengajuankeluar.show',
        'edit' => 'staff.pengajuankeluar.edit',
        'update' => 'staff.pengajuankeluar.update',
        'destroy' => 'staff.pengajuankeluar.destroy'
    ]);
});

// Desa
Route::middleware(['auth', 'verified', 'role:desa'])->group(function () {
    Route::get('desa', DesaController::class)->name('desa.dashboard');
    Route::get('desa/surat/berkas/{id}', [SuratController::class, 'berkas'])->name('desa.surat.berkas');
    Route::post('desa/surat/send/{id}', [SuratController::class, 'send'])->name('desa.surat.send');
    Route::get('desa/surat/draft', [SuratController::class, 'draft'])->name('desa.surat.draft');
    Route::get('desa/surat/riwayat', [SuratController::class, 'riwayat'])->name('desa.surat.riwayat');
    Route::get('/datatable.json', [SuratController::class, '__datatable'])->name('desa.surat.riwayat_table');
    Route::get('/download-report', [SuratController::class, 'downloadReport'])->name('desa.surat.riwayat_download');
    Route::resource('desa/surat', SuratController::class)->names([
        'index' => 'desa.surat.index',
        'create' => 'desa.surat.create',
        'store' => 'desa.surat.store',
        'show' => 'desa.surat.show',
        'edit' => 'desa.surat.edit',
        'update' => 'desa.surat.update',
        'destroy' => 'desa.surat.destroy'
    ]);
     Route::get('desa/suratkeluar/berkassuratkeluar/{id}', [SuratkeluarController::class, 'berkassuratkeluar'])->name('desa.suratkeluar.berkassuratkeluar');
    Route::post('desa/suratkeluar/send/{id}', [SuratkeluarController::class, 'send'])->name('desa.suratkeluar.send');
    Route::get('desa/suratkeluar/draft', [SuratkeluarController::class, 'draft'])->name('desa.suratkeluar.draft');
    Route::get('desa/suratkeluar/riwayatsuratkeluar', [SuratkeluarController::class, 'riwayatsuratkeluar'])->name('desa.suratkeluar.riwayatsuratkeluar');
    Route::get('/datatablesuratkeluar.json', [SuratkeluarController::class, '__datatablesuratkeluar'])->name('desa.suratkeluar.riwayat_tablesuratkeluar');
    Route::get('/download-reportsuratkeluar', [SuratkeluarController::class, 'downloadReportsuratkeluar'])->name('desa.suratkeluar.riwayat_downloadsuratkeluar');
    Route::resource('desa/suratkeluar', SuratkeluarController::class)->names([
        'index' => 'desa.suratkeluar.index',
        'create' => 'desa.suratkeluar.create',
        'store' => 'desa.suratkeluar.store',
        'showsuratkeluar' => 'desa.suratkeluar.showsuratkeluar',
        'edit' => 'desa.suratkeluar.edit',
        'update' => 'desa.suratkeluar.update',
        'destroysuratkeluar' => 'desa.suratkeluar.destroysuratkeluar'
    ]);
    Route::get('/desa/get-warga-data/{nik}', [WargaController::class, 'getWargaData'])->name('desa.getWargaData');
    Route::get('/datatable_warga.json', [WargaController::class, '__datatable_warga'])->name('desa.warga_table');
    Route::resource('desa/warga', WargaController::class)->names([
        'index' => 'desa.warga.index',
        'create' => 'desa.warga.create',
        'store' => 'desa.warga.store',
        'show' => 'desa.warga.show',
        'edit' => 'desa.warga.edit',
        'update' => 'desa.warga.update',
        'destroy' => 'desa.warga.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_surat_masuk.json', [SuratMasukController::class, '__datatable_surat_masuk'])->name('desa.surat.surat_masuk_table');
    // Route::get('surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('desa.surat-masuk.show');
    Route::resource('desa/surat-masuk', SuratMasukController::class)->names([
        'index' => 'desa.surat-masuk.index',
        'create' => 'desa.surat-masuk.create',
        'store' => 'desa.surat-masuk.store',
        'show' => 'desa.surat-masuk.show',
        'edit' => 'desa.surat-masuk.edit',
        'update' => 'desa.surat-masuk.update',
        'destroy' => 'desa.surat-masuk.destroy'
    ]);

    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_aparatur-pemdes.json', [AparaturPemdesController::class, '__datatable_aparatur_pemdes'])->name('desa.surat.aparatur_pemdes_table');
    Route::resource('desa/aparatur-pemdes', AparaturPemdesController::class)->names([
        'index' => 'desa.aparatur-pemdes.index',
        'create' => 'desa.aparatur-pemdes.create',
        'store' => 'desa.aparatur-pemdes.store',
        'show' => 'desa.aparatur-pemdes.show',
        'edit' => 'desa.aparatur-pemdes.edit',
        'update' => 'desa.aparatur-pemdes.update',
        'destroy' => 'desa.aparatur-pemdes.destroy'
    ]);

    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_peraturan-desa.json', [PeraturanDesaController::class, '__datatable_peraturan_desa'])->name('desa.surat.peraturan_desa_table');
    Route::resource('desa/peraturan-desa', PeraturanDesaController::class)->names([
        'index' => 'desa.peraturan-desa.index',
        'create' => 'desa.peraturan-desa.create',
        'store' => 'desa.peraturan-desa.store',
        'show' => 'desa.peraturan-desa.show',
        'edit' => 'desa.peraturan-desa.edit',
        'update' => 'desa.peraturan-desa.update',
        'destroy' => 'desa.peraturan-desa.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_peraturan-kades.json', [PeraturanKadesController::class, '__datatable_peraturan_kades'])->name('desa.surat.peraturan_kades_table');
    Route::resource('desa/peraturan-kades', PeraturanKadesController::class)->names([
        'index' => 'desa.peraturan-kades.index',
        'create' => 'desa.peraturan-kades.create',
        'store' => 'desa.peraturan-kades.store',
        'show' => 'desa.peraturan-kades.show',
        'edit' => 'desa.peraturan-kades.edit',
        'update' => 'desa.peraturan-kades.update',
        'destroy' => 'desa.peraturan-kades.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_peraturan-berkades.json', [PeraturanBerkadesController::class, '__datatable_peraturan_berkades'])->name('desa.surat.peraturan_berkades_table');
    Route::resource('desa/peraturan-berkades', PeraturanBerkadesController::class)->names([
        'index' => 'desa.peraturan-berkades.index',
        'create' => 'desa.peraturan-berkades.create',
        'store' => 'desa.peraturan-berkades.store',
        'show' => 'desa.peraturan-berkades.show',
        'edit' => 'desa.peraturan-berkades.edit',
        'update' => 'desa.peraturan-berkades.update',
        'destroy' => 'desa.peraturan-berkades.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_keputusan-kades.json', [KeputusanKadesController::class, '__datatable_keputusan_kades'])->name('desa.surat.keputusan_kades_table');
    Route::resource('desa/keputusan-kades', KeputusanKadesController::class)->names([
        'index' => 'desa.keputusan-kades.index',
        'create' => 'desa.keputusan-kades.create',
        'store' => 'desa.keputusan-kades.store',
        'show' => 'desa.keputusan-kades.show',
        'edit' => 'desa.keputusan-kades.edit',
        'update' => 'desa.keputusan-kades.update',
        'destroy' => 'desa.keputusan-kades.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_lembar-desa.json', [LembarDesaController::class, '__datatable_lembar_desa'])->name('desa.surat.lembar_desa_table');
    Route::resource('desa/lembar-desa', LembarDesaController::class)->names([
        'index' => 'desa.lembar-desa.index',
        'create' => 'desa.lembar-desa.create',
        'store' => 'desa.lembar-desa.store',
        'show' => 'desa.lembar-desa.show',
        'edit' => 'desa.lembar-desa.edit',
        'update' => 'desa.lembar-desa.update',
        'destroy' => 'desa.lembar-desa.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_notulen-musdes.json', [NotulenMusdesController::class, '__datatable_notulen_musdes'])->name('desa.surat.notulen_musdes_table');
    Route::resource('desa/notulen-musdes', NotulenMusdesController::class)->names([
        'index' => 'desa.notulen-musdes.index',
        'create' => 'desa.notulen-musdes.create',
        'store' => 'desa.notulen-musdes.store',
        'show' => 'desa.notulen-musdes.show',
        'edit' => 'desa.notulen-musdes.edit',
        'update' => 'desa.notulen-musdes.update',
        'destroy' => 'desa.notulen-musdes.destroy'
    ]);

    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_tanah-didesa.json', [TanahDidesaController::class, '__datatable_tanah_didesa'])->name('desa.surat.tanah_didesa_table');
    Route::resource('desa/tanah-didesa', TanahDidesaController::class)->names([
        'index' => 'desa.tanah-didesa.index',
        'create' => 'desa.tanah-didesa.create',
        'store' => 'desa.tanah-didesa.store',
        'show' => 'desa.tanah-didesa.show',
        'edit' => 'desa.tanah-didesa.edit',
        'update' => 'desa.tanah-didesa.update',
        'destroy' => 'desa.tanah-didesa.destroy'
    ]);
    Route::get('desa/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('desa.surat.pdf');
    Route::get('/datatable_tanah-kasdesa.json', [TanahKasdesaController::class, '__datatable_tanah_kasdesa'])->name('desa.surat.tanah_kasdesa_table');
    Route::resource('desa/tanah-kasdesa', TanahKasdesaController::class)->names([
        'index' => 'desa.tanah-kasdesa.index',
        'create' => 'desa.tanah-kasdesa.create',
        'store' => 'desa.tanah-kasdesa.store',
        'show' => 'desa.tanah-kasdesa.show',
        'edit' => 'desa.tanah-kasdesa.edit',
        'update' => 'desa.tanah-kasdesa.update',
        'destroy' => 'desa.tanah-kasdesa.destroy'
    ]);

});

Route::middleware(['auth', 'verified', 'role:staff|admin'])->group(function () {
    Route::get('/pengguna-baru', [UserController::class, 'baru'])->name('pengguna-baru');
    Route::get('/pengguna-baru/{id}', [UserController::class, 'baru_detail'])->name('pengguna-baru.detail');
    Route::post('/pengguna-baru/{id}', [UserController::class, 'baru_konfirmasi'])->name('pengguna-baru.konfirmasi');
    Route::post('/pengguna-baru/tolak/{id}', [UserController::class, 'baru_tolak'])->name('pengguna-baru.tolak');
});

Route::prefix('kades-dashboard')->name('kades.')->group(function () {
    // ... (route-route lain yang sudah ada) ...

    // Route untuk preview PDF
    Route::get('/pengajuan/{id}/preview-pdf', [KadesController::class, 'previewPdf'])->name('pengajuan.preview_pdf');
     Route::get('/pengajuankeluar/{id}/preview-pdf', [KadeskeluarController::class, 'previewPdf'])->name('pengajuankeluar.preview_pdf');
});

// Anda mungkin juga perlu route unduh.surat di luar grup jika digunakan secara publik
// atau sesuaikan dengan struktur routing Anda.
Route::get('/unduh-surat/{id}', function($id) {
    // Logika untuk mengunduh surat (sama seperti di method previewPdf tapi mungkin return download)
    $ps = \App\Models\Surat\PengajuanSurat::with('detail_surats')->findOrFail($id);
    $list = $ps->detail_surats->first();
    if (!$list) {
        abort(404, 'Detail Surat tidak ditemukan.');
    }
    setlocale(LC_TIME, 'id_ID');
    \Carbon\Carbon::setLocale('id');
    $selesaiStatus = \App\Models\Surat\PengajuanSurat::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'desc')->pluck('id')->toArray();
    $indeks = array_flip($selesaiStatus);
    $user = \App\Models\User::where('id', $list->users_id)->first();
    $qrCodes = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->generate('https://silama.apk62.com/cek/surat/' . $list->id);
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('front.unduh', compact('list', 'ps', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');
    return $pdf->download('surat_' . $list->jenis_surat . '_' . $list->id . '.pdf');
})->name('unduh.surat');


Route::get('/unduh-suratkeluar/{id}', function($id) {
    // Logika untuk mengunduh surat (sama seperti di method previewPdf tapi mungkin return download)
    $pskeluar = \App\Models\Suratkeluar\PengajuanSuratkeluar::with('detail_suratkeluars')->findOrFail($id);
    $listkeluar = $pskeluar->detail_suratkeluars->first();
    if (!$listkeluar) {
        abort(404, 'Detail Surat tidak ditemukan.');
    }
    setlocale(LC_TIME, 'id_ID');
    \Carbon\Carbon::setLocale('id');
    $selesaiStatus = \App\Models\Suratkeluar\PengajuanSuratkeluar::whereIn('status', ['Dikonfirmasi', 'Selesai'])->orderBy('created_at', 'desc')->pluck('id')->toArray();
    $indeks = array_flip($selesaiStatus);
    $user = \App\Models\User::where('id', $listkeluar->users_id)->first();
    $qrCodes = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->generate('https://silama.apk62.com/cekkeluar/suratkeluar/' . $listkeluar->id);
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('front.unduhkeluar', compact('listkeluar', 'pskeluar', 'user', 'qrCodes', 'indeks'))->setPaper('Legal', 'potrait');
    return $pdf->download('surat_' . $listkeluar->jenis_surat . '_' . $listkeluar->id . '.pdf');
})->name('unduh.suratkeluar');



require __DIR__ . '/auth.php';
