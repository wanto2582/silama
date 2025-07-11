<x-app-layout>
    <x-slot name="title">Buat Surat Baru</x-slot>
    @include('sweetalert::alert')
    @if(Auth::user()->detail_users->nik == null)
    <div class="alert alert-warning" role="alert">
        Lengkapi data diri anda terlebih dahulu sebelum membuat surat.
        <a href="{{route('profile.edit')}}">Klik disini</a>
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Pending')
    <div class="alert alert-warning" role="alert">
        Akun anda sedang ditinjau oleh staff.
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Ditolak')
    <div class="alert alert-warning" role="alert">
        Akun anda tidak diperbolehkan membuat surat.
    </div>
    @else
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Daftar Surat Layanan Masyarakat</h4>
            </div>
        </div>

        <form>
            <div class="form-group row">
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT KETERANGAN</option>
                        <option value="skd">Surat Keterangan Domisili </option>
                        <option value="sks">Surat Keterangan Sakit </option>
                        <option value="skk">Surat Keterangan Kematian </option>
                        <option value="sktm">Surat Keterangan Tidak Mampu </option>
                         <option value="skkk">Surat Keterangan Kepemilikan Kendaraan </option>
                        <option value="sku">Surat Keterangan Usaha </option>
                        <option value="skl">Surat Keterangan Kelahiran </option>    
                    </select>
                 </div>
                </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT PERNYATAAN</option>
                        <option value="spa">Surat Pernyataan a </option>
                        <option value="spb">Surat Pernyataan b </option>
                    </select>
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT PENGANTAR</option>
                        <option value="spa">Surat Pengantar a </option>
                        <option value="spb">Surat Pengantar b </option>
                    </select>
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT IZIN/REKOMENDASI</option>
                        <option value="spa">Surat Rekomendasi a </option>
                        <option value="spb">Surat Izin a </option>
                    </select>
                 </div>
            </div>


        </form>
    </div>
    @endif
    {{-- SURAT KETERANGAN --}}
    <x-form-surat.skd id="skd" :detailSurat="$detailSurat" />
    <x-form-surat.sks id="sks" :detailSurat="$detailSurat" />
    <x-form-surat.skk id="skk" :detailSurat="$detailSurat" />
    <x-form-surat.sktm id="sktm" :detailSurat="$detailSurat" />
    <x-form-surat.skkk id="skkk" :detailSurat="$detailSurat" />
    <x-form-surat.skl id="skl" :detailSurat="$detailSurat" />
    <x-form-surat.sku id="sku" :detailSurat="$detailSurat" :warga="$warga" />

    {{-- SURAT PERNYATAAN --}}
    <x-form-surat.spa id="spa" :detailSurat="$detailSurat" />
    <x-form-surat.spb id="spb" :detailSurat="$detailSurat" />

</x-app-layout>

    <script>
    function showCard(selectedValue) {
        // Semua card SURAT KETERANGAN disembunyikan terlebih dahulu
        document.getElementById("skd").style.display = "none";
        document.getElementById("sks").style.display = "none";
        document.getElementById("skk").style.display = "none";
        document.getElementById("sktm").style.display = "none";
        document.getElementById("skkk").style.display = "none";
        document.getElementById("sku").style.display = "none";
        document.getElementById("skl").style.display = "none";

        // Semua card SURAT PERNYATAAN disembunyikan terlebih dahulu
        document.getElementById("spa").style.display = "none";
        document.getElementById("spb").style.display = "none";
       


        // Tampilkan card SURAT KETERANGAN sesuai dengan nilai yang dipilih
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
        // Tampilkan card SURAT PERNYATAAN sesuai dengan nilai yang dipilih
        } else if (selectedValue === "spa") {
            document.getElementById("spa").style.display = "block";
        } else if (selectedValue === "spb") {
            document.getElementById("spb").style.display = "block";


        }
        }
    </script>