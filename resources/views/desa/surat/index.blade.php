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
    <div class="pd-20 card-box mb-30 shadow-lg rounded-lg border-primary">
        <div class="clearfix border-bottom pb-3 mb-4 d-flex align-items-center">
            <i class="icon-copy dw dw-file-1 mr-3 text-blue" style="font-size: 2.5rem;"></i>
            <div class="flex-grow-1">
                <h4 class="text-blue h4 mb-1">DAFTAR SURAT LAYANAN MASYARAKAT</h4>
                <p class="mb-0 text-muted">SILAKAN PILIH JENIS SURAT YANG INGIN ANDA BUAT DARI DAFTAR DI BAWAH INI.</p>
            </div>
        </div>

        <form>
            <div class="form-group row align-items-center">
                <label for="pilih_surat" class="col-md-3 col-form-label font-weight-bold text-uppercase">PILIH JENIS SURAT:</label>
                <div class="col-md-9">
                    <select name="pilih_surat" id="pilih_surat" class="form-control custom-select-lg shadow-sm rounded" style="width: 100%; height: 45px;" onchange="showCard(this.value)">
                        <option value="">-- PILIH SURAT YANG INGIN DIBUAT --</option>
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
                            <option value="sikd">Surat Izin Kepala Desa</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </form>

        



    </div>
    @endif

    {{-- SURAT KETERANGAN --}}
    <x-form-surat.skd id="skd" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.sks id="sks" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.skk id="skk" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.sktm id="sktm" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.skkk id="skkk" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.skl id="skl" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.sku id="sku" :detailSurat="$detailSurat" :warga="$warga" style="display: none;" />
    {{-- SURAT KETERANGAN LAINNYA --}}
    <x-form-surat.lsk id="lsk" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT IZIN / REKOMENDASI --}}
    <x-form-surat.sikd id="sikd" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.spb id="spb" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.srek id="srek" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT PERNYATAAN --}}
    <x-form-surat.sptn id="sptn" :detailSurat="$detailSurat" style="display: none;" />
    {{-- SURAT PENGANTAR --}}
    <x-form-surat.spa id="spa" :detailSurat="$detailSurat" style="display: none;" />
    <x-form-surat.speng id="speng" :detailSurat="$detailSurat" style="display: none;" />

</x-app-layout>

<script>
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
        } else if (selectedValue === "spb") {
            document.getElementById("spb").style.display = "block";
            // SURAT PENGANTAR sesuai dengan nilai yang dipilih
        } else if (selectedValue === "spa") {
            document.getElementById("spa").style.display = "block";
            } else if (selectedValue === "speng") {
            document.getElementById("speng").style.display = "block";


 
        }
        } 
    </script>
    
