<div class="sidebar-menu">
    <ul id="accordion-menu">
        @if (auth()->user()->hasRole('admin'))
        {{-- <x-menu.sidebar-menu-item class="no-arrow {{request()->is('admin') ? 'active' : ''}}" link="{{route('admin.dashboard')}}" icon="micon bi bi-house" title="Home"/> --}}
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('admin/users') ? 'active' : ''}}" link="{{route('admin.users.index')}}" icon="micon bi bi-archive" title="Users" />
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('pengguna-baru') ? 'active' : ''}}" link="{{route('pengguna-baru')}}" icon="micon bi bi-person-plus" title="Pengguna Baru" />


{{-- MENU KADES --}}
        @elseif (auth()->user()->hasRole('kades'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades') ? 'active' : ''}}" link="{{route('kades.dashboard')}}" icon="micon bi bi-house" title="Dashboard" />
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('kades/*') ? 'active' : ''}}">
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Buku Register</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/pengajuan') ? 'active' : ''}}" link="{{route('kades.pengajuan.index')}}" icon="" title="Belum di Tanda Tangani" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/list') ? 'active' : ''}}" link="{{route('kades.pengajuan.list')}}" icon="" title="Selesai" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/reject') ? 'active' : ''}}" link="{{route('kades.pengajuan.reject')}}" icon="" title="Ditolak" />
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('kades/*') ? 'active' : ''}}">
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Buku Agenda</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/pengajuankeluar') ? 'active' : ''}}" link="{{route('kades.pengajuankeluar.index')}}" icon="" title="Belum Tanda Tangan" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/listkeluar') ? 'active' : ''}}" link="{{route('kades.pengajuankeluar.listkeluar')}}" icon="" title="Selesai" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('kades/rejectkeluar') ? 'active' : ''}}" link="{{route('kades.pengajuankeluar.rejectkeluar')}}" icon="" title="Ditolak" />
            </ul>
        </li>


        {{-- MENU SEKDES --}}
        @elseif (auth()->user()->hasRole('staff'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff') ? 'active' : ''}}" link="{{route('staff.dashboard')}}" icon="micon bi bi-house" title="Dashboard" />
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('staff/*') ? 'active' : ''}}">
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Buku Register</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/pengajuan') ? 'active' : ''}}" link="{{route('staff.pengajuan.index')}}" icon="" title="Belum diKonfirmasi" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/list') ? 'active' : ''}}" link="{{route('staff.pengajuan.list')}}" icon="" title="Selesai" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/reject') ? 'active' : ''}}" link="{{route('staff.pengajuan.reject')}}" icon="" title="Ditolak" />
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('staff/*') ? 'active' : ''}}">
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Buku Agenda</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/pengajuankeluar') ? 'active' : ''}}" link="{{route('staff.pengajuankeluar.index')}}" icon="" title="Belum diKonfirmasi" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/listkeluar') ? 'active' : ''}}" link="{{route('staff.pengajuankeluar.listkeluar')}}" icon="" title="Selesai" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('staff/rejectkeluar') ? 'active' : ''}}" link="{{route('staff.pengajuankeluar.rejectkeluar')}}" icon="" title="Ditolak" />
            </ul>
        </li>
        {{-- <x-menu.sidebar-menu-item class="no-arrow {{request()->is('pengguna-baru') ? 'active' : ''}}" link="{{route('pengguna-baru')}}" icon="micon bi bi-person-plus" title="Pengguna Baru" /> --}}



     {{-- MENU DESA        --}}
        @elseif (auth()->user()->hasRole('desa'))
        <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa') ? 'active' : ''}}" link="{{route('desa.dashboard')}}" icon="micon bi bi-house" title="Dashboard" />
        <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/surat*') ? 'active' : ''}}" style="background-color: black; border-radius: 5px; margin-bottom: 5px;">
        <span class="micon bi bi-inbox" style="color:white"></span><span class="mtext" style="color:white">Buku Agenda</span>
        </a>
        <ul class="dropdown">
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/suratkeluar*') ? '' : ''}}">
                <span class="micon bi bi-files"></span><span class="mtext">Surat Keluar</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/suratkeluar') ? 'active' : ''}}" link="{{route('desa.suratkeluar.index')}}" icon="" title="Buat Surat" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/suratkeluar/riwayatsuratkeluar') ? 'active' : ''}}" link="{{route('desa.suratkeluar.riwayatsuratkeluar')}}" icon="" title="Riwayat Surat Keluar" />
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/suratmasuk*') ? '' : ''}}">
                <span class="micon bi bi-files"></span><span class="mtext">Surat Masuk</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.surat-masuk.index') ? 'active' : ''}}" link="{{route('desa.surat-masuk.index')}}" icon="" title="Data Surat" />
            </ul>
        </li>
        </ul>
        </li>  
        
            <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/surat*') ? 'active' : ''}}" style="background-color: grey; border-radius: 5px; margin-bottom: 5px;">
                <span class="micon bi bi-files" style="color:white"></span><span class="mtext" style="color:white">Buku Register</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/surat') ? 'active' : ''}}" link="{{route('desa.surat.index')}}" icon="" title="Surat Layanan" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/surat/riwayat') ? 'active' : ''}}" link="{{route('desa.surat.riwayat')}}" icon="" title="Riwayat Pengajuan" />
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/surat*') ? 'active' : ''}}" style="background-color: grey; border-radius: 5px; margin-bottom: 5px;">
                <span class="micon bi bi-files" style="color:white"></span><span class="mtext" style="color:white">Buku Administrasi</span>
            </a>
            <ul class="submenu">
                <style>
                    .sidebar-menu .submenu .sidebar-menu-item .mtext,
                    .sidebar-menu .submenu .sidebar-menu-item span,
                    .sidebar-menu .submenu .sidebar-menu-item {
                        max-width: 210px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        white-space: nowrap;
                        display: inline-block;
                        vertical-align: middle;
                    }
                </style>
                <x-menu.sidebar-menu-item class="text-indent no-arrow {{request()->is('desa.peraturan-desa.index') ? 'active' : ''}}" link="{{route('desa.peraturan-desa.index')}}" icon="" title="Peraturan Desa" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.peraturan-kades.index') ? 'active' : ''}}" link="{{route('desa.peraturan-kades.index')}}" icon="" title="Peraturan Kades" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.peraturan-berkades.index') ? 'active' : ''}}" link="{{route('desa.peraturan-berkades.index')}}" icon="" title="Peraturan Bersama Kades" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.keputusan-kades.index') ? 'active' : ''}}" link="{{route('desa.keputusan-kades.index')}}" icon="" title="Keputusan Kepala Desa" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.lembar-desa.index') ? 'active' : ''}}" link="{{route('desa.lembar-desa.index')}}" icon="" title="Lembaran & Berita Desa" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.notulen-musdes.index') ? 'active' : ''}}" link="{{route('desa.notulen-musdes.index')}}" icon="" title="Notulen MusDes" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.aparatur-pemdes.index') ? 'active' : ''}}" link="{{route('desa.aparatur-pemdes.index')}}" icon="" title="Aparatur PemDes" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.tanah-kasdesa.index') ? 'active' : ''}}" link="{{route('desa.tanah-kasdesa.index')}}" icon="" title="Tanah Kas Desa" />
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa.tanah-didesa.index') ? 'active' : ''}}" link="{{route('desa.tanah-didesa.index')}}" icon="" title="Tanah di Desa" />
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle {{request()->is('desa/warga*') ? 'active' : ''}}" style="background-color: grey; border-radius: 5px; margin-bottom: 5px;">
                <span class="micon bi bi-people" style="color:white"></span><span class="mtext" style="color:white">Buku induk</span>
            </a>
            <ul class="submenu">
                <x-menu.sidebar-menu-item class="no-arrow {{request()->is('desa/warga*') ? 'active' : ''}}" link="{{route('desa.warga.index')}}" icon="bi bi-people" title="Data Penduduk" />
                    
            </ul>
        @endif
       </li>
       
        </li>
    </ul>
</div>

