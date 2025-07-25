<x-app-layout>
    <x-slot name="title">BUAT SURAT KELUAR BARU</x-slot>
    @include('sweetalert::alert')

    @if(Auth::user()->detail_users->nik == null)
    <div class="custom-alert alert-warning" role="alert">
        <i class="icon-copy dw dw-warning alert-icon"></i>
        LENGKAPI DATA DIRI ANDA TERLEBIH DAHULU SEBELUM MEMBUAT SURAT KELUAR.
        <a href="{{route('profile.edit')}}">KLIK DI SINI</a>
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Pending')
    <div class="custom-alert alert-warning" role="alert">
        <i class="icon-copy dw dw-hourglass alert-icon"></i>
        AKUN ANDA SEDANG DITINJAU OLEH STAFF.
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Ditolak')
    <div class="custom-alert alert-warning" role="alert">
        <i class="icon-copy dw dw-ban alert-icon"></i>
        AKUN ANDA TIDAK DIPERBOLEHKAN MEMBUAT SURAT KELUAR.
    </div>
    @else
    <div class="pd-20 card-box mb-30 shadow-lg rounded-lg"> {{-- MENAMBAHKAN SHADOW DAN ROUNDED --}}
        <div class="clearfix mb-4 border-bottom pb-3">
            <div class="pull-left d-flex align-items-center">
                <i class="icon-copy dw dw-file-add mr-3 text-blue" style="font-size: 2.5rem;"></i> {{-- IKON UNTUK JUDUL --}}
                <h4 class="text-blue h4 mb-0">PILIH JENIS SURAT KELUAR</h4> {{-- MENGUBAH JUDUL --}}
            </div>
        </div>

        <form class="form-surat-keluar-selector"> {{-- MENAMBAHKAN KELAS UNTUK STYLING --}}
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="select_surat" class="form-label font-weight-bold text-uppercase mb-2">PILIH JENIS SURAT:</label>
                    <select name="select_surat" id="select_surat" class="form-control custom-select" style="width: 100%; height: 45px; background: #c8e6c9; "  onchange="showCard(this.value)">
                        <option value="">-- PILIH JENIS SURAT KELUAR --</option>
                        <optgroup label="SURAT UNDANGAN">
                            <option value="su">Surat Undangan 1</option>
                            <option value="su5">Surat Undangan 1-5</option>
                        </optgroup>
                        <optgroup label="SURAT PERINTAH / TUGAS">
                            <option value="spt">Surat Perintah Tugas</option>
                            <option value="spt_lain">.........</option> {{-- CONTOH OPSI TAMBAHAN --}}
                        </optgroup>
                        <optgroup label="SURAT EDARAN / PENGUMUMAN">
                            <option value="se">........</option> {{-- CONTOH OPSI BARU --}}
                            <option value="pengumuman">...........</option> {{-- CONTOH OPSI BARU --}}
                        </optgroup>
                        <optgroup label="SURAT PENGANTAR">
                            <option value="sp">.........</option> {{-- CONTOH OPSI BARU --}}
                            <option value="sp_lain">..........</option> {{-- CONTOH OPSI TAMBAHAN --}}
                        </optgroup>
                        <optgroup label="SURAT LAINNYA">
                            <option value="sku">.......</option> {{-- MEMINDAHKAN SKU KE SINI --}}
                            <option value="sl_lain">.......</option> {{-- CONTOH OPSI TAMBAHAN --}}
                        </optgroup>
                    </select>
                </div>
            </div>
        </form>
    </div>
    @endif

    <x-form-suratkeluar.su id="su" :detailSuratkeluar="$detailSuratkeluar" style="display:none;" /> {{-- SEMBUNYIKAN SECARA DEFAULT --}}
    <x-form-suratkeluar.su5 id="su5" :detailSuratkeluar="$detailSuratkeluar" style="display:none;" /> {{-- SEMBUNYIKAN SECARA DEFAULT --}}
    <x-form-suratkeluar.spt id="spt" :detailSuratkeluar="$detailSuratkeluar" :warga="$warga" style="display:none;" /> {{-- SEMBUNYIKAN SECARA DEFAULT --}}
    {{-- PASTIKAN SEMUA KOMPONEN FORM LAINNYA JUGA DITAMBAHKAN DI SINI DENGAN STYLE="DISPLAY:NONE;" --}}
<div class="card-box pd-10 height-100-p mb-30 shadow-lg shadow-color:#000000 rounded-3 border-color:#000000" style="background: #949496;">
    <div class="d-flex flex-wrap justify-content-start align-items-stretch custom-card-row">
        {{-- Card 1: Layanan Surat --}}
        <div class="custom-card-col mb-10">
              {{-- <a href="" class="d-block h-100"> --}}
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #bbdefb;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #1976d2;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Undangan</div>
                </div>
            </div>
        </div>
    {{-- </a> --}}

        {{-- Card 2: Belum tanda tangan --}}
        <div class="custom-card-col mb-10"> 
            {{-- <a href="#" onclick="showCard('skd'); return false;" class="d-block h-100"> --}}
                <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #c8e6c9;">
                    <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                        <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                            <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #388e3c;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                        </div>
                        <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Perintah/Tugas</div>
                    </div>
                </div>
        </div>
    {{-- </a> --}}

        {{-- Card 3: Sudah tanda tangan --}}
        <div class="custom-card-col mb-10">
            {{-- <a href="" class="d-block h-100"> --}}
                <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffe0b2;">
                    <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                        <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                            <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #f57c00;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                        </div>
                        <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Edaran/Pengumuman</div>
                    </div>
                </div>
        </div>
    {{-- </a> --}}

        {{-- Card 4: Surat ditolak --}}
        <div class="custom-card-col mb-10">
            {{-- <a href="" class="d-block h-100"> --}}
                <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffcdd2;">
                    <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                        <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                            <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #d32f2f;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                        </div>
                        <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Lainya</div>
                    </div>
                </div>
            {{-- </a> --}}
        </div>

        {{-- Tambahkan 4 Card-Box lagi di sini dengan struktur yang sama --}}
        {{-- Card 5: Draft Baru --}}
        <div class="custom-card-col mb-10">
             {{-- <a href="" class="d-block h-100"> --}}
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #e0f2f7;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #0288d1;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">.......</div>
                </div>
            </div>
        </div>
    {{-- </a> --}}

        {{-- Card 6: Menunggu Review --}}
        <div class="custom-card-col mb-10">
             {{-- <a href="" class="d-block h-100"> --}}
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #e1bee7;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #8e24aa;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">.......</div>
                </div>
            </div>
        </div>
    {{-- </a> --}}

        {{-- Card 7: Revisi Dibutuhkan --}}
        <div class="custom-card-col mb-10">
             {{-- <a href="" class="d-block h-100"> --}}
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #fff9c4;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #fbc02d;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">.......</div>
                </div>
            </div>
        </div>
    {{-- </a> --}}

        {{-- Card 8: Semua Selesai --}}
        <div class="custom-card-col mb-10">
             {{-- <a href="" class="d-block h-100"> --}}
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #d1c4e9;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-file-earmark-ruled" style="font-size: 1.5rem; color: #5e35b1;"></i> <div class="h5 mb-0" style="font-size: 1.1rem;">Surat</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">.......</div>
                </div>
            </div>
        </div>
    {{-- </a> --}}
    </div> </div></div>
</x-app-layout>

<script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("su").style.display = "none";
        document.getElementById("su5").style.display = "none";
        document.getElementById("spt").style.display = "none";
        // TAMBAHKAN SEMUA ID KOMPONEN FORM LAINNYA DI SINI UNTUK DISEMBUNYIKAN

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue) { // HANYA TAMPILKAN JIKA ADA NILAI YANG DIPILIH
            const selectedElement = document.getElementById(selectedValue);
            if (selectedElement) {
                selectedElement.style.display = "block";
            }
        }
    }

    // PANGGIL showCard SAAT HALAMAN DIMUAT UNTUK MEMASTIKAN SEMUA FORM TERSEMBUNYI
    document.addEventListener('DOMContentLoaded', function() {
        showCard(''); // PANGGIL DENGAN NILAI KOSONG UNTUK MENYEMBUNYIKAN SEMUA PADA AWAL
    });
</script>

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
        <style>
    /* GAYA UMUM UNTUK SIDEBAR MENU */
    .sidebar-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu ul li {
        margin-bottom: 8px; /* JARAK ANTAR ITEM MENU */
    }

    .sidebar-menu ul li a {
        display: flex;
        align-items: center;
        padding: 12px 15px; /* PADDING LEBIH BESAR */
        border-radius: 8px; /* SUDUT MEMBULAT UNTUK ITEM */
        color: #555; /* WARNA TEKS DEFAULT */
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease; /* TRANSISI HALUS UNTUK HOVER/ACTIVE */
        position: relative;
        overflow: hidden; /* UNTUK EFEK HOVER */
        z-index: 1;
    }

    /* EFEK HOVER UNTUK SEMUA ITEM MENU */
    .sidebar-menu ul li a:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 123, 255, 0.1); /* WARNA HOVER BIRU MUDA */
        transition: all 0.3s ease;
        z-index: -1;
    }

    .sidebar-menu ul li a:hover:before {
        left: 0;
    }

    .sidebar-menu ul li a:hover {
        color: #007bff; /* WARNA TEKS BIRU SAAT HOVER */
    }

    /* GAYA UNTUK ITEM MENU AKTIF */
    .sidebar-menu ul li a.active {
        background-color: #007bff; /* WARNA LATAR BELAKANG AKTIF */
        color: white; /* TEKS PUTIH UNTUK LATAR BELAKANG AKTIF */
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2); /* BAYANGAN UNTUK ITEM AKTIF */
        transform: translateY(-2px); /* EFEK NAIK SEDIKIT */
    }
    .sidebar-menu ul li a.active .micon,
    .sidebar-menu ul li a.active .mtext {
        color: white !important; /* MEMASTIKAN IKON DAN TEKS TETAP PUTIH */
    }
    .sidebar-menu ul li a.active:before {
        background-color: transparent; /* HILANGKAN EFEK HOVER PADA ACTIVE */
    }

    /* GAYA UNTUK IKON */
    .sidebar-menu .micon {
        font-size: 1.5rem; /* UKURAN IKON LEBIH BESAR */
        margin-right: 12px; /* JARAK ANTARA IKON DAN TEKS */
        color: #6c757d; /* WARNA IKON DEFAULT */
        transition: color 0.3s ease;
    }
    .sidebar-menu ul li a:hover .micon {
        color: #007bff; /* WARNA IKON BIRU SAAT HOVER */
    }

    /* GAYA UNTUK TEKS MENU */
    .sidebar-menu .mtext {
        flex-grow: 1; /* MEMASTIKAN TEKS MENGISI RUANG YANG TERSISA */
        font-size: 0.95rem;
    }

    /* GAYA UNTUK DROPDOWN TOGGLE (MENU UTAMA DENGAN SUBMENU) */
    .sidebar-menu .dropdown > a.dropdown-toggle {
        background-color: #f0f2f5; /* LATAR BELAKANG SEDIKIT LEBIH GELAP DARI DEFAULT */
        color: #343a40; /* TEKS LEBIH GELAP */
        font-weight: 700;
    }
    .sidebar-menu .dropdown > a.dropdown-toggle:hover {
        background-color: #e2e6ea;
        color: #007bff;
    }
    .sidebar-menu .dropdown > a.dropdown-toggle.active {
        background-color: #007bff;
        color: white;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
    }
    .sidebar-menu .dropdown > a.dropdown-toggle.active .micon,
    .sidebar-menu .dropdown > a.dropdown-toggle.active .mtext {
        color: white !important;
    }

    /* GAYA UNTUK SUBMENU */
    .sidebar-menu .submenu {
        padding-left: 25px; /* INDENTASI SUBMENU */
        background-color: #f8f9fa; /* LATAR BELAKANG SUBMENU */
        border-left: 3px solid #dee2e6; /* GARIS PANDU SUBMENU */
        margin-top: 5px;
        border-radius: 0 0 8px 8px; /* SUDUT BULAT DI BAWAH */
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .sidebar-menu .submenu li a {
        padding: 8px 10px; /* PADDING LEBIH KECIL UNTUK SUBMENU ITEM */
        font-size: 0.8rem; /* UKURAN FONT SUBMENU DIKECILKAN */
        font-weight: 500;
        color: #6c757d;
    }
    .sidebar-menu .submenu li a:hover {
        background-color: rgba(0, 123, 255, 0.08); /* HOVER SUBMENU ITEM */
        color: #007bff;
    }
    .sidebar-menu .submenu li a.active {
        background-color: #e0f2ff; /* LATAR BELAKANG AKTIF SUBMENU ITEM */
        color: #007bff;
        font-weight: 600;
    }
    .sidebar-menu .submenu li a.active:before {
        background-color: transparent;
    }
    .sidebar-menu .submenu li a .micon { /* IKON SUBMENU */
        font-size: 1.2rem;
        margin-right: 8px;
        color: #6c757d;
    }
    .sidebar-menu .submenu li a:hover .micon,
    .sidebar-menu .submenu li a.active .micon {
        color: #007bff;
    }

    /* GAYA UNTUK TEKS PANJANG DI SUBMENU (DARI KODE ASLI) */
    /* MODIFIKASI UNTUK MEMUNGKINKAN WRAP TEXT DAN MENGHILANGKAN HURUF KAPITAL */
    .sidebar-menu .submenu .sidebar-menu-item .mtext,
    .sidebar-menu .submenu .sidebar-menu-item span,
    .sidebar-menu .submenu .sidebar-menu-item {
        max-width: 210px; /* BATASI LEBAR TEKS */
        white-space: normal; /* DIUBAH MENJADI NORMAL UNTUK WRAP */
        display: inline-block; /* TETAPKAN INLINE-BLOCK UNTUK MEMPERTAHANKAN LAYOUT */
        vertical-align: middle;
        text-transform: none; /* MENGHILANGKAN HURUF KAPITAL */
    }

    /* GAYA UNTUK FORM PEMILIHAN SURAT KELUAR */
    .form-surat-keluar-selector .form-group {
        margin-bottom: 20px; /* RUANG BAWAH UNTUK SETIAP FORM GROUP */
    }
    .form-surat-keluar-selector .form-control {
        border-radius: 8px; /* SUDUT MEMBULAT UNTUK SELECT */
        border: 1px solid #ced4da; /* WARNA BORDER DEFAULT */
        box-shadow: 0 2px 4px rgba(0,0,0,0.05); /* SEDIKIT BAYANGAN */
        padding: 10px 15px; /* PADDING LEBIH BAIK */
        font-size: 1rem; /* UKURAN FONT STANDARD */
        height: auto; /* BIARKAN TINGGI MENYESUAIKAN KONTEN */
    }
    .form-surat-keluar-selector .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        outline: 0;
    }
    .form-surat-keluar-selector optgroup {
        font-weight: bold;
        color: #007bff; /* WARNA JUDUL OPTGROUP */
        padding: 8px 0;
    }
    .form-surat-keluar-selector option {
        padding: 8px 15px; /* PADDING UNTUK OPSI */
    }

    /* GAYA UNTUK ALERT BOX */
    .custom-alert {
        padding: 1rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.5rem;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .custom-alert.alert-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
    }
    .custom-alert .alert-icon {
        font-size: 1.5rem;
    }
    .custom-alert a {
        font-weight: bold;
        text-decoration: underline;
        color: #0056b3; /* WARNA LINK YANG JELAS */
    }
    .custom-alert a:hover {
        color: #003f7f;
    }
</style>
        
