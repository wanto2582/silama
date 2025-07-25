<x-app-layout>
    <x-slot name="title">DASHBOARD</x-slot>
    <div class="pd-ltr-10">
        <div class="card-box pd-20 height-100-p mb-10 shadow-lg rounded-lg border-bottom-0"> {{-- MENAMBAHKAN SHADOW DAN ROUNDED --}}
            <div class="row align-items-center">
                <div class="col-md-4 text-center"> {{-- RATA TENGAH UNTUK GAMBAR --}}
                    <img src="{{asset('vendors/images/banner-img.png')}}" alt="Selamat Datang" class="img-fluid rounded-lg shadow-sm" style="max-height: 200px; object-fit: cover;" /> {{-- UKURAN DAN GAYA GAMBAR --}}
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize text-blue">
                        HALO,
                        <div class="weight-600 font-30 text-primary mt-2">{{ Auth::user()->name }}</div> {{-- MENGGUNAKAN TEXT-PRIMARY --}}
                    </h4>
                    <p class="font-18 max-width-600 text-muted">
                        SELAMAT DATANG! MUDAHKAN URUSAN ADMINISTRASI DESA ANDA DI SINI.
                    </p>
                </div>
            </div>
        </div>

    
        {{-- BAGIAN BUKU AGENDA SURAT --}}
        <div class="card-box pd-10 height-100-p mb-10 shadow-lg rounded-lg">
            <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
                <a href="{{route('desa.suratkeluar.index')}}">
            <i class="icon-copy dw dw-agenda mr-3 text-blue" style="font-size: 2.5rem;"></i>
            <div class="widget-data">
                <div class="h5 mb-0 text-primary">BUKU AGENDA SURAT</div>
                <div class="weight-600 font-14 text-muted">DAFTAR SURAT MASUK, SURAT KELUAR, SURAT PENGANTAR, DAN LAINNYA</div></a>
            </div>
            </div>
            <div class="row">
                <a href="{{route('desa.suratkeluar.index')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-primary text-white p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="bi bi-envelope-paper icon-dashboard"></i>
                    <div class="h4 mb-0 text-white angka-dashboard">6</div>
                    </div>
                    <div class="weight-600 font-14 text-white teks-dashboard">SURAT KELUAR</div>
                </div>
                </div></a>
            </div>
            <a href="{{route('desa.suratkeluar.riwayatsuratkeluar')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-info text-white p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="icon-copy bi bi-envelope-plus icon-dashboard"></i>
                    <div class="h4 mb-0 text-white angka-dashboard">{{Auth::user()->pengajuan_suratkeluars->count()}}</div>
                    </div>
                    <div class="weight-600 font-14 text-white teks-dashboard">SURAT YANG DIBUAT</div>
                </div>
                </div></a>
            </div>
            <a href="{{route('desa.suratkeluar.riwayatsuratkeluar')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-warning text-dark p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="icon-copy bi bi-envelope-dash icon-dashboard" style="color: #343a40;"></i>
                    <div class="h4 mb-0 text-dark angka-dashboard">{{Auth::user()->pengajuan_suratkeluars->whereIn('status', ['Diproses', 'Dikonfirmasi'])->count()}}</div>
                    </div>
                    <div class="weight-600 font-14 text-dark teks-dashboard">SURAT DIPROSES</div>
                </div>
                </div></a>
            </div>
            <a href="{{route('desa.suratkeluar.riwayatsuratkeluar')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-success text-white p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="icon-copy bi bi-envelope-check icon-dashboard"></i>
                    <div class="h4 mb-0 text-white angka-dashboard">{{Auth::user()->pengajuan_suratkeluars->whereIn('status', ['Selesai'])->count()}}</div>
                    </div>
                    <div class="weight-600 font-14 text-white teks-dashboard">SURAT SELESAI</div>
                </div>
                </div></a>
            </div>
            </div>
        </div>

        {{-- BAGIAN SURAT LAYANAN MASYARAKAT --}}
        <div class="card-box pd-10 height-100-p mb-10 shadow-lg rounded-lg">
            <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
                <a href="{{route('desa.surat.index')}}">
            <i class="icon-copy dw dw-mail mr-3 text-blue" style="font-size: 2.5rem;"></i>
            <div class="widget-data">
                <div class="h5 mb-0 text-primary">SURAT LAYANAN MASYARAKAT</div>
                <div class="weight-600 font-14 text-muted">SURAT PERMOHONAN, KETERANGAN, PERNYATAAN, REKOMENDASI DAN LAINNYA</div></a>
            </div>
            </div>
            <div class="row"><a href="{{route('desa.surat.index')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-primary text-white p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="bi bi-envelope-paper icon-dashboard"></i>
                    <div class="h4 mb-0 text-white angka-dashboard">13</div>
                    </div>
                    <div class="weight-600 font-14 text-white teks-dashboard">SURAT PERMOHONAN</div>
                </div>
                </div></a>
            </div>
            <a href="{{route('desa.surat.riwayat')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-info text-white p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="icon-copy bi bi-envelope-plus icon-dashboard"></i>
                    <div class="h4 mb-0 text-white angka-dashboard">{{Auth::user()->pengajuan_surats->count()}}</div>
                    </div>
                    <div class="weight-600 font-14 text-white teks-dashboard">SURAT YANG DIBUAT</div>
                </div>
                </div></a>
            </div>
            <a href="{{route('desa.surat.index')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-warning text-dark p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="icon-copy bi bi-envelope-dash icon-dashboard" style="color: #343a40;"></i>
                    <div class="h4 mb-0 text-dark angka-dashboard">{{Auth::user()->pengajuan_surats->whereIn('status', ['Diproses', 'Dikonfirmasi'])->count()}}</div>
                    </div>
                    <div class="weight-600 font-14 text-dark teks-dashboard">SURAT DIPROSES</div>
                </div>
                </div></a>
            </div>
            <a href="{{route('desa.surat.index')}}">
            <div class="col-6 col-md-6 col-lg-4 col-xl-3 mb-20">
                <div class="card-box height-100-p widget-style1 bg-success text-white p-3 rounded-lg shadow-sm dashboard-card">
                <div class="dashboard-flex-mobile">
                    <div class="dashboard-icon-angka">
                    <i class="icon-copy bi bi-envelope-check icon-dashboard"></i>
                    <div class="h4 mb-0 text-white angka-dashboard">{{Auth::user()->pengajuan_surats->whereIn('status', ['Selesai'])->count()}}</div>
                    </div>
                    <div class="weight-600 font-14 text-white teks-dashboard">SURAT SELESAI</div>
                </div>
                </div></a>
            </div>
            </div>
        </div>

        {{-- Tambahkan CSS responsive --}}
        <style>
            .dashboard-flex-mobile {
            display: flex;
            align-items: center;
            gap: 1rem;
            }
            .dashboard-icon-angka {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            }
            .dashboard-card .widget-data {
            display: flex;
            flex-direction: column;
            justify-content: center;
            }
            @media (max-width: 767.98px) {
            .dashboard-flex-mobile {
                flex-direction: column;
                align-items: center;
                gap: 0.3rem;
                text-align: center;
            }
            .dashboard-icon-angka {
                flex-direction: row;
                align-items: center;
                gap: 0.5rem;
            }
            .dashboard-card .widget-data {
                align-items: center;
            }
            .icon-dashboard {
                font-size: 2.2rem !important;
                margin-bottom: 0.2rem;
            }
            .angka-dashboard {
                font-size: 1.2rem !important;
            }
            .teks-dashboard {
                font-size: 0.9rem !important;
                margin-top: 0.4rem;
            }
            }
            @media (max-width: 575.98px) {
            .dashboard-flex-mobile {
                flex-direction: column;
                align-items: center;
                gap: 0.2rem;
            }
            .dashboard-icon-angka {
                flex-direction: row;
                align-items: center;
                gap: 0.4rem;
            }
            .icon-dashboard {
                font-size: 1.5rem !important;
            }
            .angka-dashboard {
                font-size: 1rem !important;
            }
            .teks-dashboard {
                font-size: 0.8rem !important;
            }
            .dashboard-card {
                padding: 0.7rem !important;
            }
            }
            @media (max-width: 400px) {
            .icon-dashboard {
                font-size: 1.2rem !important;
            }
            .angka-dashboard {
                font-size: 0.9rem !important;
            }
            .teks-dashboard {
                font-size: 0.7rem !important;
            }
            }
           /* Untuk kontainer induk custom-card-row */
.custom-card-row {
    margin-left: -5px; /* Mengurangi padding default dari .row atau gap */
    margin-right: -5px; /* Mengurangi padding default dari .row atau gap */
}

/* Untuk setiap kolom card-box */
.custom-card-col {
    flex: 0 0 auto; /* Hindari pertumbuhan atau penyusutan */
    width: 12.5%;   /* 100% / 8 = 12.5% */
    padding-left: 5px; /* Sesuaikan dengan margin-left/right di parent */
    padding-right: 5px; /* Sesuaikan dengan margin-left/right di parent */
    box-sizing: border-box; /* Pastikan padding tidak menambah lebar total */
}

/* Penyesuaian Responsif */
@media (max-width: 1199.98px) { /* Untuk layar laptop dan tablet besar (lg) */
    .custom-card-col {
        width: 25%; /* 4 item per baris */
    }
}

@media (max-width: 991.98px) { /* Untuk tablet (md) */
    .custom-card-col {
        width: 33.333%; /* 3 item per baris */
    }
}

@media (max-width: 767.98px) { /* Untuk mobile (sm) */
    .custom-card-col {
        width: 50%; /* 2 item per baris */
    }
}

@media (max-width: 575.98px) { /* Untuk mobile kecil (xs) */
    .custom-card-col {
        width: 50%; /* INI YANG DIUBAH: 2 item per baris untuk mobile */
    }
}
        </style>
        </div>
    </div>
</x-app-layout>
