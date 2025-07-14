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
                            <option value="skd">SURAT KETERANGAN DOMISILI (SKD)</option>
                            <option value="sks">SURAT KETERANGAN SAKIT (SKS)</option>
                            <option value="skk">SURAT KETERANGAN KEMATIAN (SKK)</option>
                            <option value="sktm">SURAT KETERANGAN TIDAK MAMPU (SKTM)</option>
                            <option value="skkk">SURAT KETERANGAN KEPEMILIKAN KENDARAAN (SKKK)</option>
                            <option value="sku">SURAT KETERANGAN USAHA (SKU)</option>
                            <option value="skl">SURAT KETERANGAN KELAHIRAN (SKL)</option>
                            <option value="lsk">SURAT KETERANGAN LAINNYA (LSK)</option>
                        </optgroup>
                        <optgroup label="SURAT PERNYATAAN">
                            <option value="sptn">SURAT PERNYATAAN (SPTN)</option>
                        </optgroup>
                        <optgroup label="SURAT PENGANTAR">
                            <option value="spa">SURAT PENGANTAR A (SPA)</option>
                            <option value="spb">SURAT PENGANTAR B (SPB)</option>
                        </optgroup>
                        <optgroup label="SURAT IZIN / REKOMENDASI">
                            <option value="sra">SURAT REKOMENDASI A (SRA)</option> {{-- ASUMSI NILAI BARU UNTUK REKOMEN A --}}
                            <option value="sikd">SURAT IZIN KEPALA DESA (SIKD)</option>
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
    {{-- SURAT PERNYATAAN --}}
    <x-form-surat.sptn id="sptn" :detailSurat="$detailSurat" style="display: none;" />
    {{-- TAMBAHAN UNTUK SURAT PENGANTAR A (SPA) JIKA BELUM ADA KOMPONEN X-FORM-SURAT UNTUKNYA --}}
    {{-- <x-form-surat.spa id="spa" :detailSurat="$detailSurat" style="display: none;" /> --}}
    {{-- TAMBAHAN UNTUK SURAT REKOMENDASI A (SRA) JIKA BELUM ADA KOMPONEN X-FORM-SURAT UNTUKNYA --}}
    {{-- <x-form-surat.sra id="sra" :detailSurat="$detailSurat" style="display: none;" /> --}}

</x-app-layout>

<script>
    function showCard(selectedValue) {
        // DAFTAR SEMUA ID CARD YANG MUNGKIN
        const allCardIds = [
            "skd", "sks", "skk", "sktm", "skkk", "sku", "skl", // SURAT KETERANGAN
            "lsk", // SURAT KETERANGAN LAINNYA
            "sptn", // SURAT PERNYATAAN
            "spa", "spb", // SURAT PENGANTAR
            "sra", "sikd" // SURAT IZIN/REKOMENDASI
        ];

        // SEMBUNYIKAN SEMUA CARD TERLEBIH DAHULU
        allCardIds.forEach(id => {
            const cardElement = document.getElementById(id);
            if (cardElement) {
                cardElement.style.display = "none";
            }
        });

        // TAMPILKAN CARD YANG SESUAI DENGAN NILAI YANG DIPILIH
        if (selectedValue && document.getElementById(selectedValue)) {
            document.getElementById(selectedValue).style.display = "block";
        }
    }

    // PENTING: SEMBUNYIKAN SEMUA CARD SAAT HALAMAN PERTAMA KALI DIMUAT
    // AGAR HANYA DROPDOWN YANG TERLIHAT.
    document.addEventListener('DOMContentLoaded', (event) => {
        showCard(''); // PANGGIL DENGAN NILAI KOSONG UNTUK MENYEMBUNYIKAN SEMUA
    });
</script>
