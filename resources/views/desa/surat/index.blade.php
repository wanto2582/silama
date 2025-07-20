<x-app-layout>
    <x-slot name="title">BUAT SURAT BARU</x-slot>
    @include('sweetalert::alert')

    @if(Auth::user()->detail_users->nik == null)
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center rounded-lg shadow-sm" role="alert">
        <i class="icon-copy dw dw-warning mr-2 text-warning" style="font-size: 1.5rem;"></i>
        <div>
            LENGKAPI DATA DIRI ANDA TERLEBIH DAHULU SEBELUM MEMBUAT SURAT.
            <a href="{{route('profile.edit')}}" class="alert-link font-weight-bold">KLIK DI SINI</a> UNTUK MELENGKAPI.
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Pending')
    <div class="alert alert-info alert-dismissible fade show d-flex align-items-center rounded-lg shadow-sm" role="alert">
        <i class="icon-copy dw dw-info mr-2 text-info" style="font-size: 1.5rem;"></i>
        <div>
            AKUN ANDA SEDANG DITINJAU OLEH STAFF. MOHON TUNGGU KONFIRMASI.
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Ditolak')
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center rounded-lg shadow-sm" role="alert">
        <i class="icon-copy dw dw-cancel mr-2 text-danger" style="font-size: 1.5rem;"></i>
        <div>
            AKUN ANDA TIDAK DIPERBOLEHKAN MEMBUAT SURAT. SILAKAN HUBUNGI ADMINISTRATOR.
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @else
    <div class="pd-20 card-box mb-10 shadow-lg rounded-lg border-primary">
        <div class="clearfix border-bottom pb-3 mb-4 d-flex align-items-center">
            <i class="icon-copy dw dw-file-1 mr-3 text-blue" style="font-size: 2.5rem;"></i>
            <div class="flex-grow-1">
                <h4 class="text-blue h6 mb-1">DAFTAR SURAT LAYANAN MASYARAKAT</h6>
                <p class="mb-0 text-muted">Silahkan pilih jenis surat yang akan anda buat di bawah ini.</p>
            </div>
        </div>

        <form>
            <div class="form-group row align-items-center">
                <label for="pilih_surat" class="col-md-3 col-form-label font-weight-bold text-uppercase">PILIH JENIS SURAT:</label>
                <div class="col-md-12">
                    <select name="pilih_surat" id="pilih_surat" class="form-control custom-select-lg shadow-sm rounded" style="width: 100%; height: 45px; background: #ffe0b2; " onchange="showCard(this.value)">
                        <option value="">-- PILIH SURAT YANG INGIN DIBUAT DISINI --</option>
                        <optgroup label="SURAT KETERANGAN">
                            <option value="skd">Surat Keterangan Domisili</option>
                            <option value="sks">Surat Keterangan Sakit</option>
                            <option value="skk">Surat Keterangan Kematian</option>
                            <option value="sktm">Surat Keterangan Tidak Mampu</option>
                            <option value="skkk">Surat Keterangan Kepemilikan Kendaraan</option>
                            <option value="sku">Surat Keterangan Usaha</option>
                            <option value="skl">Surat Keterangan Kelahiran</option>
                            <option value="lsk">Surat Keterangan Lainya</option>
                        </optgroup>
                        <optgroup label="SURAT PERNYATAAN">
                            <option value="sptn">Surat Pernyataan</option>
                        </optgroup>
                        <optgroup label="SURAT PENGANTAR">
                            <option value="speng">Surat Pengantar</option>
                        </optgroup>
                        <optgroup label="SURAT IZIN / REKOMENDASI">
                            <option value="srek">Surat Rekomendasi</option>
                            <option value="si">Surat Izin</option>
                            <option value="sikd">Surat Izin Kepala Desa</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </form>
    @endif

    {{-- SURAT KETERANGAN --}}
    <x-form-surat.skd id="skd" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.sks id="sks" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.skk id="skk" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.sktm id="sktm" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.skkk id="skkk" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.skl id="skl" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.sku id="sku" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT KETERANGAN LAINNYA --}}
    <x-form-surat.lsk id="lsk" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT IZIN / REKOMENDASI --}}
    <x-form-surat.sikd id="sikd" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.spb id="spb" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.srek id="srek" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.si id="si" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT PERNYATAAN --}}
    <x-form-surat.sptn id="sptn" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT PENGANTAR --}}
    <x-form-surat.spa id="spa" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.speng id="speng" :detailSurat="$detailSurat" :warga="$warga" style="display: none;" />


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
                    <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Keterangan</div>
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
                        <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Pernyataan</div>
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
                        <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Pengantar</div>
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
                        <div class="weight-600 font-12 mt-0" style="font-size: 0.8rem;">Izin/Rekomendasi</div>
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
    <script> //Pembuka form lebih simpel
    function showCard(selectedValue) {
        // Daftar semua ID yang mungkin perlu disembunyikan
        const allCardContentIds = [
            "skd", "sks", "skk", "sktm", "skkk", "sku", "skl", // Surat Keterangan
            "lsk", // Layout Surat Keterangan
            "sikd", "spb", "srek", "si", // Surat Izin / Rekomendasi
            "sptn", "spb", // Surat Pernyataan (perhatikan 'spb' duplikat, pastikan ini sengaja)
            "spa", "speng" // Surat Pengantar
        ];
        // Sembunyikan semua elemen terlebih dahulu
        allCardContentIds.forEach(id => {
            const element = document.getElementById(id);
            if (element) { // Pastikan elemen ditemukan sebelum mencoba mengubah gayanya
                element.style.display = "none";
            }
        });
        // Tampilkan elemen yang dipilih
        const selectedElement = document.getElementById(selectedValue);
        if (selectedElement) { // Pastikan elemen ditemukan
            selectedElement.style.display = "block";
        }
    }
    // Opsional: Sembunyikan semua konten saat halaman dimuat
    // agar hanya header dan card-box yang terlihat
    document.addEventListener('DOMContentLoaded', (event) => {
        const allCardContentIds = [
            "skd", "sks", "skk", "sktm", "skkk", "sku", "skl", // Surat Keterangan
            "lsk", // Layout Surat Keterangan
            "sikd", "spb", "srek", "si",// Surat Izin / Rekomendasi
            "sptn", "spb", // Surat Pernyataan (perhatikan 'spb' duplikat, pastikan ini sengaja)
            "spa", "speng" // Surat Pengantar
        ];
        allCardContentIds.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.style.display = "none";
            }
        });
    });
</script>
{{-- <script>
    function showCard(selectedValue) {
        // SURAT KETERANGAN disembunyikan terlebih dahulu
        document.getElementById("skd").style.display = "none";
        document.getElementById("sks").style.display = "none";
        document.getElementById("skk").style.display = "none";
        document.getElementById("sktm").style.display = "none";
        document.getElementById("skkk").style.display = "none";
        document.getElementById("sku").style.display = "none";
        document.getElementById("skl").style.display = "none";
        // LAYOUTE SURAT KETERANGN disembunyikan terlebih dahulu
        document.getElementById("lsk").style.display = "none";
        // SURAT IZIN / REKOMENDASI disembunyikan terlebih dahulu
        document.getElementById("sikd").style.display = "none";
        document.getElementById("spb").style.display = "none";
        document.getElementById("srek").style.display = "none";
        document.getElementById("si").style.display = "none";

        // SURAT PERNYATAAN disembunyikan terlebih dahulu
        document.getElementById("sptn").style.display = "none";
        document.getElementById("spb").style.display = "none";
         // SURAT PENGANTAR disembunyikan terlebih dahulu
        document.getElementById("spa").style.display = "none";
        document.getElementById("speng").style.display = "none";


 
        // SURAT KETERANGAN sesuai dengan nilai yang dipilih
        if (selectedValue === "skd") {
            document.getElementById("skd").style.display = "block";
        } else if (selectedValue === "sks") {
            document.getElementById("sks").style.display = "block";
        } else if (selectedValue === "skk") {
            document.getElementById("skk").style.display = "block";
        } else if (selectedValue === "sktm") {
            document.getElementById("sktm").style.display = "block";
        } else if (selectedValue === "skkk") {
            document.getElementById("skkk").style.display = "block";
        } else if (selectedValue === "sku") {
            document.getElementById("sku").style.display = "block";
        } else if (selectedValue === "skl") {
            document.getElementById("skl").style.display = "block";
         // SURAK KETERANGAN sesuai dengan nilai yang dipilih
        } else if (selectedValue === "lsk") {
            document.getElementById("lsk").style.display = "block";
        // SURAT PERNYATAAN sesuai dengan nilai yang dipilih
        } else if (selectedValue === "sptn") {
            document.getElementById("sptn").style.display = "block";
        } else if (selectedValue === "spb") {
            document.getElementById("spb").style.display = "block";
        // SURAT IZIN / REKOMENDASI sesuai dengan nilai yang dipilih
        } else if (selectedValue === "sikd") {
            document.getElementById("sikd").style.display = "block";
        } else if (selectedValue === "srek") {
            document.getElementById("srek").style.display = "block";
        } else if (selectedValue === "si") {
            document.getElementById("si").style.display = "block";
        } else if (selectedValue === "spb") {
            document.getElementById("spb").style.display = "block";
            // SURAT PENGANTAR sesuai dengan nilai yang dipilih
        } else if (selectedValue === "spa") {
            document.getElementById("spa").style.display = "block";
            } else if (selectedValue === "speng") {
            document.getElementById("speng").style.display = "block";

        }
        } 
    </script> --}}
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
        
      
    
