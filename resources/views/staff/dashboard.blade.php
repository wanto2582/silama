<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-10">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('vendors/images/banner-img.png')}}" alt="" />
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Halo,
                        <div class="weight-600 font-20 text-blue">{{ Auth::user()->name }}</div>
                    </h4>
                    <p class="font-18 max-width-600">
                        Selamat datang! Mudahkan urusan administrasi desa Anda di sini.
                    </p>
                </div>
            </div>
        </div>

       


{{-- BAGIAN SURAT LAYANAN MASYARAKAT --}}
<div class="card-box pd-10 height-100-p mb-30 shadow-lg rounded-lg" style="background: #f0f2f5;">
    <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
        <i class="icon-copy dw dw-mail mr-3 text-blue" style="font-size: 2rem;"></i>
        <div class="widget-data">
            <div class="h5 mb-0 text-primary">SURAT LAYANAN MASYARAKAT</div>
            <div class="weight-600 font-14 text-muted">SURAT PERMOHONAN, KETERANGAN, PERNYATAAN, REKOMENDASI DAN LAINNYA</div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #bbdefb;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-envelope-paper" style="font-size: 1.5rem; color: #1976d2;"></i>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">6</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Layanan Surat</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #c8e6c9;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <a href="{{route('staff.pengajuan.index')}}">
                        <i class="icon-copy bi bi-envelope-plus" style="font-size: 1.5rem; color: #388e3c;"></i>
                        </a>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($ps->where('status', 'Diproses'))}}</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat belum dikonfirmasi</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffe0b2;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <a href="{{route('staff.pengajuan.list')}}">
                        <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #f57c00;"></i>
                        </a>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($ps->whereIn('status', ['Dikonfirmasi', 'Selesai']))}}</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat sudah dikonfirmasi</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffcdd2;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <a href="{{route('staff.pengajuan.reject')}}">
                        <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #d32f2f;"></i>
                        </a>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($ps->whereIn('status', ['Ditolak']))}}</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat ditolak</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- BAGIAN BUKU AGENDA SURAT --}}
<div class="card-box pd-10 height-100-p mb-30 shadow-lg rounded-lg" style="background: #f0f2f5;">
    <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
        <i class="icon-copy dw dw-agenda mr-3 text-blue" style="font-size: 2rem;"></i>
        <div class="widget-data">
            <div class="h5 mb-0 text-primary">BUKU AGENDA SURAT</div>
            <div class="weight-600 font-14 text-muted">DAFTAR SURAT MASUK, SURAT KELUAR, SURAT PENGANTAR, DAN LAINNYA</div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #bbdefb;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <i class="bi bi-envelope-paper" style="font-size: 1.5rem; color: #1976d2;"></i>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">6</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat Keluar</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #c8e6c9;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <a href="{{route('staff.pengajuankeluar.index')}}">
                        <i class="icon-copy bi bi-envelope-plus" style="font-size: 1.5rem; color: #388e3c;"></i>
                        </a>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($pskeluar->where('status', 'Diproses'))}}</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat belum dikonfirmasi</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffe0b2;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <a href="{{route('staff.pengajuankeluar.listkeluar')}}">
                        <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #f57c00;"></i>
                        </a>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($pskeluar->whereIn('status', ['Dikonfirmasi', 'Selesai']))}}</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat sudah dikonfirmasi</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-3">
            <div class="card-box height-100-p widget-style1 py-2 px-1" style="background: #ffcdd2;">
                <div class="d-flex flex-column align-items-center" style="gap: 2px;">
                    {{-- Icon dan Angka dalam satu baris untuk mobile, kembali vertikal untuk desktop --}}
                    <div class="d-flex flex-row flex-md-column align-items-center mb-1" style="gap: 5px;">
                        <a href="{{route('staff.pengajuankeluar.rejectkeluar')}}">
                        <i class="icon-copy bi bi-envelope-dash" style="font-size: 1.5rem; color: #d32f2f;"></i>
                        </a>
                        <div class="h5 mb-0" style="font-size: 1.1rem;">{{count($pskeluar->whereIn('status', ['Ditolak']))}}</div>
                    </div>
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Surat ditolak</div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</x-app-layout>
