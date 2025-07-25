<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-10">
        <div class="card-box pd-10 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('vendors/images/banner-img.png')}}" alt="" />
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Halo,
                        <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}</div>
                    </h4>
                    <p class="font-18 max-width-600">
                        Selamat datang! Mudahkan urusan administrasi desa Anda di sini.
                    </p>
                </div>
            </div>
        </div>

{{-- BAGIAN SURAT LAYANAN MASYARAKAT --}}
<div class="card-box pd-10 height-100-p mb-20 shadow-lg rounded-lg" style="background: #ffffff;">
    <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
        <i class="icon-copy dw dw-mail mr-3 text-blue" style="font-size: 2rem;"></i>
        <div class="widget-data">
            <div class="h5 mb-0 text-primary">SURAT LAYANAN MASYARAKAT</div>
            <div class="weight-600 font-14 text-muted">SURAT PERMOHONAN, KETERANGAN, PERNYATAAN, REKOMENDASI DAN LAINNYA</div>
        </div>
    </div>
      <div class="row">
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #bbdefb;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                    <i class="bi bi-envelope-paper" style="font-size: 1.5rem; color: #1976d2;"></i>
                    <div class="h5 mb-0" style="font-size: 1.1rem;">13</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Layanan Surat</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30"> <a href="{{route('kades.pengajuan.index')}}">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffe0b2;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                   
                    <i class="icon-copy bi bi-envelope-plus" style="font-size: 1.5rem; color: #f57c00;"></i>
                    
                    <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($ps->where('status', 'Dikonfirmasi'))}}</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Belum tanda tangan</div>
            </div>
        </div>
    </div></a>
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30"> <a href="{{route('kades.pengajuan.list')}}">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #c8e6c9;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                   
                    <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #388e3c;"></i>
                   
                    <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($ps->whereIn('status', ['Selesai']))}}</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Sudah tanda tangan</div>
            </div>
        </div>
    </div> </a>
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30"><a href="{{route('kades.pengajuan.reject')}}">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffcdd2;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                    
                    <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #d32f2f;"></i>
                    
                    <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($ps->whereIn('status', ['Ditolak']))}}</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat ditolak</div>
            </div>
        </div>
    </div></a>
</div></div>

{{-- BAGIAN BUKU AGENDA SURAT --}}
<div class="card-box pd-10 height-100-p mb-30 shadow-lg rounded-lg" style="background: #ffffff;">
    <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
        <i class="icon-copy dw dw-agenda mr-3 text-blue" style="font-size: 2rem;"></i>
        <div class="widget-data">
            <div class="h5 mb-0 text-primary">BUKU AGENDA SURAT</div>
            <div class="weight-600 font-14 text-muted">DAFTAR SURAT MASUK, SURAT KELUAR, SURAT PENGANTAR, DAN LAINNYA</div>
        </div>
    </div>
<div class="row">
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #bbdefb;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                    <i class="bi bi-envelope-paper" style="font-size: 1.5rem; color: #1976d2;"></i>
                    <div class="h5 mb-0" style="font-size: 1.1rem;">6</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat keluar</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30"> <a href="{{route('kades.pengajuankeluar.index')}}">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffe0b2;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                   
                    <i class="icon-copy bi bi-envelope-plus" style="font-size: 1.5rem; color: #f57c00;"></i>
                    
                    <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($pskeluar->where('status', 'Dikonfirmasi'))}}</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Belum tanda tangan</div>
            </div>
        </div>
    </div></a>
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30"> <a href="{{route('kades.pengajuankeluar.listkeluar')}}">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #c8e6c9;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                   
                    <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #388e3c;"></i>
                    
                    <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($pskeluar->whereIn('status', ['Selesai']))}}</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Sudah tanda tangan</div>
            </div>
        </div>
    </div></a>
    <div class="col-6 col-md-6 col-lg-3 col-xl-3 mb-30"><a href="{{route('kades.pengajuankeluar.rejectkeluar')}}">
        <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffcdd2;">
            <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                    
                    <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #d32f2f;"></i>
                    
                    <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($pskeluar->whereIn('status', ['Ditolak']))}}</div>
                </div>
                <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat ditolak</div>
            </div>
        </div>
    </div></a>
</div>
</div>

        </div>
    </div>
</x-app-layout>
