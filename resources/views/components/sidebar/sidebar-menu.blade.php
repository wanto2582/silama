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
</style>

<div class="sidebar-menu">
    <ul id="accordion-menu">
        @if (auth()->user()->hasRole('admin'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('admin/users') ? 'active' : ''}}" link="{{route('admin.users.index')}}" icon="micon bi bi-archive" title="Users" />
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('pengguna-baru') ? 'active' : ''}}" link="{{route('pengguna-baru')}}" icon="micon bi bi-person-plus" title="Pengguna Baru" />

        {{-- MENU KADES --}}
        @elseif (auth()->user()->hasRole('kades'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades') ? 'active' : ''}}" link="{{route('kades.dashboard')}}" icon="micon bi bi-house" title="Dashboard" />
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('kades/pengajuan*') ? 'active' : ''}}"> {{-- AKTIFKAN BERDASARKAN SEGMENT URL --}}
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Buku Register</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/pengajuan') ? 'active' : ''}}" link="{{route('kades.pengajuan.index')}}" icon="micon bi bi-file-earmark-minus" title="Belum di Tanda Tangani" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/list') ? 'active' : ''}}" link="{{route('kades.pengajuan.list')}}" icon="micon bi bi-file-earmark-check" title="Selesai" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/reject') ? 'active' : ''}}" link="{{route('kades.pengajuan.reject')}}" icon="micon bi bi-file-earmark-x" title="Ditolak" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('kades/pengajuankeluar*') ? 'active' : ''}}"> {{-- AKTIFKAN BERDASARKAN SEGMENT URL --}}
                <span class="micon bi bi-book"></span><span class="mtext">Buku Agenda</span> {{-- IKON BERBEDA --}}
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/pengajuankeluar') ? 'active' : ''}}" link="{{route('kades.pengajuankeluar.index')}}" icon="micon bi bi-file-earmark-minus" title="Belum Tanda Tangan" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/listkeluar') ? 'active' : ''}}" link="{{route('kades.pengajuankeluar.listkeluar')}}" icon="micon bi bi-file-earmark-check" title="Selesai" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/rejectkeluar') ? 'active' : ''}}" link="{{route('kades.pengajuankeluar.rejectkeluar')}}" icon="micon bi bi-file-earmark-x" title="Ditolak" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>

        {{-- MENU SEKDES --}}
        @elseif (auth()->user()->hasRole('staff'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff') ? 'active' : ''}}" link="{{route('staff.dashboard')}}" icon="micon bi bi-house" title="Dashboard" />
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('staff/pengajuan*') ? 'active' : ''}}"> {{-- AKTIFKAN BERDASARKAN SEGMENT URL --}}
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Buku Register</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/pengajuan') ? 'active' : ''}}" link="{{route('staff.pengajuan.index')}}" icon="micon bi bi-file-earmark-minus" title="Belum Dikonfirmasi" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/list') ? 'active' : ''}}" link="{{route('staff.pengajuan.list')}}" icon="micon bi bi-file-earmark-check" title="Selesai" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/reject') ? 'active' : ''}}" link="{{route('staff.pengajuan.reject')}}" icon="micon bi bi-file-earmark-x" title="Ditolak" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('staff/pengajuankeluar*') ? 'active' : ''}}"> {{-- AKTIFKAN BERDASARKAN SEGMENT URL --}}
                <span class="micon bi bi-book"></span><span class="mtext">Buku Agenda</span> {{-- IKON BERBEDA --}}
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/pengajuankeluar') ? 'active' : ''}}" link="{{route('staff.pengajuankeluar.index')}}" icon="micon bi bi-file-earmark-minus" title="Belum Dikonfirmasi" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/listkeluar') ? 'active' : ''}}" link="{{route('staff.pengajuankeluar.listkeluar')}}" icon="micon bi bi-file-earmark-check" title="Selesai" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/rejectkeluar') ? 'active' : ''}}" link="{{route('staff.pengajuankeluar.rejectkeluar')}}" icon="micon bi bi-file-earmark-x" title="Ditolak" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>

        {{-- MENU DESA --}}
        @elseif (auth()->user()->hasRole('desa'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa') ? 'active' : ''}}" link="{{route('desa.dashboard')}}" icon="micon bi bi-house" title="Dashboard" />
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/surat*') ? 'active' : ''}}">
                <span class="micon bi bi-inbox"></span><span class="mtext">Buku Agenda</span>
            </a>
            <ul class="submenu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/suratkeluar*') ? 'active' : ''}}"> {{-- AKTIFKAN SUB-DROPDOWN --}}
                        <span class="micon bi bi-files"></span><span class="mtext">Surat Keluar</span>
                    </a>
                    <ul class="submenu">
                        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/suratkeluar') ? 'active' : ''}}" link="{{route('desa.suratkeluar.index')}}" icon="micon bi bi-pencil-square" title="Buat Surat" /> {{-- MENAMBAHKAN IKON --}}
                        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/suratkeluar/riwayatsuratkeluar') ? 'active' : ''}}" link="{{route('desa.suratkeluar.riwayatsuratkeluar')}}" icon="micon bi bi-clock-history" title="Riwayat Surat Keluar" /> {{-- MENAMBAHKAN IKON --}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/suratmasuk*') ? 'active' : ''}}"> {{-- AKTIFKAN SUB-DROPDOWN --}}
                        <span class="micon bi bi-files"></span><span class="mtext">Surat Masuk</span>
                    </a>
                    <ul class="submenu">
                        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/surat-masuk.index') ? 'active' : ''}}" link="{{route('desa.surat-masuk.index')}}" icon="micon bi bi-folder" title="Data Surat" /> {{-- MENAMBAHKAN IKON --}}
                    </ul>
                </li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/surat*') ? 'active' : ''}}">
                <span class="micon bi bi-files"></span><span class="mtext">Buku Register</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/surat') ? 'active' : ''}}" link="{{route('desa.surat.index')}}" icon="micon bi bi-pencil-square" title="Surat Layanan" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/surat/riwayat') ? 'active' : ''}}" link="{{route('desa.surat.riwayat')}}" icon="micon bi bi-clock-history" title="Riwayat Pengajuan" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/administrasi*') ? 'active' : ''}}"> {{-- MENGUBAH CEK URL UNTUK KATEGORI INI --}}
                <span class="micon bi bi-journal-text"></span><span class="mtext">Buku Administrasi</span> {{-- IKON BERBEDA --}}
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/peraturan-desa.index') ? 'active' : ''}}" link="{{route('desa.peraturan-desa.index')}}" icon="micon bi bi-file-earmark-text" title="Peraturan Desa" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.peraturan-kades.index') ? 'active' : ''}}" link="{{route('desa.peraturan-kades.index')}}" icon="micon bi bi-file-earmark-text" title="Peraturan Kades" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.peraturan-berkades.index') ? 'active' : ''}}" link="{{route('desa.peraturan-berkades.index')}}" icon="micon bi bi-file-earmark-text" title="Peraturan Bersama Kades" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.keputusan-kades.index') ? 'active' : ''}}" link="{{route('desa.keputusan-kades.index')}}" icon="micon bi bi-file-earmark-text" title="Keputusan Kepala Desa" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.lembar-desa.index') ? 'active' : ''}}" link="{{route('desa.lembar-desa.index')}}" icon="micon bi bi-file-earmark-text" title="Lembaran & Berita Desa" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.notulen-musdes.index') ? 'active' : ''}}" link="{{route('desa.notulen-musdes.index')}}" icon="micon bi bi-file-earmark-text" title="Notulen Musdes" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.aparatur-pemdes.index') ? 'active' : ''}}" link="{{route('desa.aparatur-pemdes.index')}}" icon="micon bi bi-file-earmark-text" title="Aparatur Pemdes" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.tanah-kasdesa.index') ? 'active' : ''}}" link="{{route('desa.tanah-kasdesa.index')}}" icon="micon bi bi-file-earmark-text" title="Tanah Kas Desa" /> {{-- MENAMBAHKAN IKON --}}
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.tanah-didesa.index') ? 'active' : ''}}" link="{{route('desa.tanah-didesa.index')}}" icon="micon bi bi-file-earmark-text" title="Tanah di Desa" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/warga*') ? 'active' : ''}}">
                <span class="micon bi bi-people"></span><span class="mtext">Buku Induk</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/warga*') ? 'active' : ''}}" link="{{route('desa.warga.index')}}" icon="micon bi bi-person-lines-fill" title="Data Penduduk" /> {{-- MENAMBAHKAN IKON --}}
            </ul>
        </li>
        @endif
    </ul>
</div>
