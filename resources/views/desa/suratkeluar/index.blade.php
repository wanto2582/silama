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
                <h4 class="text-blue h4">Daftar Surat Keluar</h4>
            </div>
        </div>

        <form>
            <div class="form-group row"> 
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT UNDANGAN</option>
                        <option value="su">Surat Undangan</option>
                        <option value="sku">Surat Undangan b</option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group row"> 
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT PERINTAH/TUGAS</option>
                        <option value="spt">Surat Perintah Tugas</option>
                        <option value="sku">----</option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group row"> 
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT EDARAN/PENGUMUMAN</option>
                        <option value="su">Nama Surat Edaran</option>
                        <option value="sku">Nama Surat b</option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group row"> 
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT PENGANTAR</option>
                        <option value="su">Nama Surat Pengantar</option>
                        <option value="sks">Nama Surat b</option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group row"> 
                <div class="col-md-12">
                    <select name="state" style="width: 100%; height: 38px" onchange="showCard(this.value)">
                        <option value="">Pilih SURAT LAINYA</option>
                        <option value="su">Nama Surat Lainya</option>
                       
                        
                    </select>
                </div>
            </div>



        </form>
    </div>
    @endif

    <x-form-suratkeluar.su id="su" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.spt id="spt" :detailSuratkeluar="$detailSuratkeluar" />
    <x-form-suratkeluar.sku id="sku" :detailSuratkeluar="$detailSuratkeluar" :warga="$warga" />

</x-app-layout>

<script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("su").style.display = "none";
         document.getElementById("spt").style.display = "none";
        document.getElementById("sku").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "su") {
            document.getElementById("su").style.display = "block";
            } else if (selectedValue === "spt") {
            document.getElementById("spt").style.display = "block";
        } else if (selectedValue === "sku") {
            document.getElementById("sku").style.display = "block";
        }
    }
</script>