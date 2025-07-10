<x-app-layout>
    <x-slot name="title">Buat Surat keluar Baru</x-slot>
    @include('sweetalert::alert')
    @if(Auth::user()->detail_users->nik == null)
    <div class="alert alert-warning" role="alert">
        Lengkapi data diri anda terlebih dahulu sebelum membuat suratkeluar.
        <a href="{{route('profile.edit')}}">Klik disini</a>
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Pending')
    <div class="alert alert-warning" role="alert">
        Akun anda sedang ditinjau oleh staff.
    </div>
    @elseif(Auth::user()->detail_users->status_akun == 'Ditolak')
    <div class="alert alert-warning" role="alert">
        Akun anda tidak diperbolehkan membuat suratkeluar.
    </div>
    @else
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Buat Surat Baru</h4>
            </div>
        </div>

        <form>
            <div class="form-group row"> 
                <div class="col-md-12">

                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih Jenis Surat</option>
                        <option value="skd">Surat Keterangan Domisili (SKD)</option>
                        <option value="sks">Surat Keterangan Sakit (SKS)</option>
                        <option value="skk">Surat Keterangan Kematian (SKK)</option>
                        <option value="sktm">Surat Keterangan Tidak Mampu (SKTM)</option>
                         <option value="skkk">Surat Keterangan Kepemilikan Kendaraan (SKKK)</option>
                        <option value="sku">Surat Keterangan Usaha (SKU)</option>    
                    </select>

                </div>
            </div>
        </form>
    </div>
    @endif

    <x-form-suratkeluar.skd id="skd" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.sks id="sks" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.skk id="skk" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.sktm id="sktm" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.skkk id="skkk" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.sku id="sku" :detailSuratkeluar="$detailSuratkeluar" :warga="$warga" />

</x-app-layout>

<script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("skd").style.display = "none";
        document.getElementById("sks").style.display = "none";
        document.getElementById("skk").style.display = "none";
        document.getElementById("sktm").style.display = "none";
        document.getElementById("skkk").style.display = "none";
        document.getElementById("sku").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
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
        }
    }
</script>