<x-app-layout>
    <x-slot name="title">DASHBOARD</x-slot>
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30 shadow-lg rounded-lg border-bottom-0"> {{-- MENAMBAHKAN SHADOW DAN ROUNDED --}}
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
        <div class="card-box pd-20 height-100-p mb-30 shadow-lg rounded-lg">
            <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
                <i class="icon-copy dw dw-agenda mr-3 text-blue" style="font-size: 2.5rem;"></i> {{-- IKON UNTUK JUDUL --}}
                <div class="widget-data">
                    <div class="h4 mb-0 text-primary">BUKU AGENDA SURAT</div> {{-- WARNA PRIMARY --}}
                    <div class="weight-600 font-14 text-muted">DAFTAR SURAT MASUK, SURAT KELUAR, SURAT PENGANTAR, DAN LAINNYA</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-primary text-white p-3 rounded-lg shadow-sm"> {{-- WARNA PRIMARY --}}
                        <div class="d-flex flex-wrap align-items-center"> {{-- CONTAINER UTAMA UNTUK ICON, ANGKA, DAN TEKS --}}
                            <i class="bi bi-envelope-paper mr-3" style="font-size: 50px; color: white;"></i> {{-- ICON LANGSUNG SEBAGAI FLEX ITEM --}}
                            <div class="widget-data d-flex align-items-baseline"> {{-- ANGKA DAN TEKS DALAM SATU BARIS --}}
                                <div class="h4 mb-0 text-white mr-2">6</div>
                                <div class="weight-600 font-14 text-white">SURAT KELUAR</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-info text-white p-3 rounded-lg shadow-sm"> {{-- WARNA INFO --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="icon-copy bi bi-envelope-plus mr-3" style="font-size: 50px; color: white;"></i>
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-white mr-2">{{Auth::user()->pengajuan_suratkeluars->count()}}</div>
                                <div class="weight-600 font-14 text-white">SURAT YANG DIBUAT</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-warning text-dark p-3 rounded-lg shadow-sm"> {{-- WARNA WARNING --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="icon-copy bi bi-envelope-dash mr-3" style="font-size: 50px; color: #343a40;"></i> {{-- TEKS GELAP UNTUK IKON --}}
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-dark mr-2">{{Auth::user()->pengajuan_suratkeluars->whereIn('status', ['Diproses', 'Dikonfirmasi'])->count()}}</div>
                                <div class="weight-600 font-14 text-dark">SURAT DIPROSES</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-success text-white p-3 rounded-lg shadow-sm"> {{-- WARNA SUCCESS --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="icon-copy bi bi-envelope-check mr-3" style="font-size: 50px; color: white;"></i>
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-white mr-2">{{Auth::user()->pengajuan_suratkeluars->whereIn('status', ['Selesai'])->count()}}</div>
                                <div class="weight-600 font-14 text-white">SURAT SELESAI</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- BAGIAN SURAT LAYANAN MASYARAKAT --}}
        <div class="card-box pd-20 height-100-p mb-30 shadow-lg rounded-lg">
            <div class="d-flex flex-wrap align-items-center mb-4 border-bottom pb-3">
                <i class="icon-copy dw dw-mail mr-3 text-blue" style="font-size: 2.5rem;"></i> {{-- IKON UNTUK JUDUL --}}
                <div class="widget-data">
                    <div class="h4 mb-0 text-primary">SURAT LAYANAN MASYARAKAT</div> {{-- WARNA PRIMARY --}}
                    <div class="weight-600 font-14 text-muted">SURAT PERMOHONAN, KETERANGAN, PERNYATAAN, REKOMENDASI DAN LAINNYA</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-primary text-white p-3 rounded-lg shadow-sm"> {{-- WARNA DANGER --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="bi bi-envelope-paper mr-3" style="font-size: 50px; color: white;"></i>
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-white mr-2">6</div>
                                <div class="weight-600 font-14 text-white">SURAT PERMOHONAN</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-info text-white p-3 rounded-lg shadow-sm"> {{-- WARNA PRIMARY --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="icon-copy bi bi-envelope-plus mr-3" style="font-size: 50px; color: white;"></i>
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-white mr-2">{{Auth::user()->pengajuan_surats->count()}}</div>
                                <div class="weight-600 font-14 text-white">SURAT YANG DIBUAT</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-warning text-dark p-3 rounded-lg shadow-sm"> {{-- WARNA WARNING --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="icon-copy bi bi-envelope-dash mr-3" style="font-size: 50px; color: #343a40;"></i> {{-- TEKS GELAP UNTUK IKON --}}
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-dark mr-2">{{Auth::user()->pengajuan_surats->whereIn('status', ['Diproses', 'Dikonfirmasi'])->count()}}</div>
                                <div class="weight-600 font-14 text-dark">SURAT DIPROSES</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30"> {{-- RESPONSIVITAS KOLOM DITINGKATKAN --}}
                    <div class="card-box height-100-p widget-style1 bg-success text-white p-3 rounded-lg shadow-sm"> {{-- WARNA SUCCESS --}}
                        <div class="d-flex flex-wrap align-items-center">
                            <i class="icon-copy bi bi-envelope-check mr-3" style="font-size: 50px; color: white;"></i>
                            <div class="widget-data d-flex align-items-baseline">
                                <div class="h4 mb-0 text-white mr-2">{{Auth::user()->pengajuan_surats->whereIn('status', ['Selesai'])->count()}}</div>
                                <div class="weight-600 font-14 text-white">SURAT SELESAI</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
