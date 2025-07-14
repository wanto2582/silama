<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-8 mb-30">
                <div class="card-box height-100-p pd-20">
                    {{-- SURAT KETERANGAN --}}
                    @if ($detailSurat->kode_surat == 'skd')
                        <x-detail-surat.skd :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'sks')
                        <x-detail-surat.sks :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'skk')
                        <x-detail-surat.skk :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'sktm')
                        <x-detail-surat.sktm :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'skkk')
                        <x-detail-surat.skkk :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'sku')
                        <x-detail-surat.sku :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'skl')
                        <x-detail-surat.skl :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                     {{-- SURAT KETERANGAN LAINYA --}}
                    @elseif ($detailSurat->kode_surat == 'lsk')
                        <x-detail-surat.lsk :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                   


                        {{-- SURAT PERNYATAAN --}}
                    @elseif ($detailSurat->kode_surat == 'sptn')
                        <x-detail-surat.sptn :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @elseif ($detailSurat->kode_surat == 'spb')
                        <x-detail-surat.spb :detailSurat="$detailSurat" :pengajuanSurat="$pengajuanSurat" :user="$user"/>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Aksi</h2>
                    <form action="{{ route('staff.pengajuan.confirm', $detailSurat->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-12">
                                <select name="status" class="custom-select col-12" onchange="showCard(this.value);">
                                    <option selected="">Konfirmasi...</option>
                                    <option value="Dikonfirmasi">Setujui</option>
                                    <option value="Ditolak">Tolak</option>
                                </select>
                            </div>
                        </div>
                        <div id="note" class="form-group" style="display: none;">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="4" cols="50"></textarea>
                        </div>
                        <x-button.primary-button>Konfirmasi</x-button.primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
   function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("note").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "Ditolak") {
            document.getElementById("note").style.display = "block";
        }
    }
</script>
