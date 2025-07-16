<h2 class="h4 mb-20">Detail - {{$detailSurat->jenis_surat}}</h2>

<table>
    <tr>
        <td width="20%">Operator </td>
        <td width="1%">:</td>
        <td>- {{ $user->name }}</td>
    </tr>
    <tr>
        <td width="20%">No WA </td>
        <td width="1%">:</td>
        <td>- {{ $user->detail_users->phone_number }}
         <a href="https://wa.me/+62{{ $user->detail_users->phone_number }}?text=Halo,%20{{ $user->name }}." target="_blank">
            Chat Whatsapp
</a></td>
    </tr>
</table>
<br>
<table class="table table-bordered">
    <tr>
        <td width="30%">Nama anak </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">NIK </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat, Tanggal Lahir </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_tempat_lahir .', '. \Carbon\Carbon::parse($detailSurat->anak_tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Jenis Kelamin anak </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_gender ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Anak ke ( format tulisan )</td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_ke ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Anak ke ( format angka ) </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_ke_angka ?? '' }}</td>
    </tr>
   
    <tr>
        <td width="30%">Alamat anak </td>
        <td width="1%">:</td>
        <td>{{$detailSurat->anak_alamat ?? ''}}</td>
    </tr>
    
</table>
<p>Data orang tua :</p>
<table class="table table-bordered">
    <tr>
        <td width="30%">Nama ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Nik ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat lahir ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_tempat_lahir ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tanggal lahir ibu </td>
        <td width="1%">:</td>
        <td>{{ \Carbon\Carbon::parse($detailSurat->ibu_tanggal_lahir)->isoFormat('D MMMM YYYY') ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_alamat ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Nama ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Nik ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat lahir ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_tempat_lahir ?? '' }}</td>
    </tr>
     <tr>
        <td width="30%">Tanggal lahir ayah </td>
        <td width="1%">:</td>
        <td>{{ \Carbon\Carbon::parse($detailSurat->ayah_tanggal_lahir)->isoFormat('D MMMM YYYY') ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_alamat ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tujuan </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->tujuan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Berkas syarat </td>
        <td width="1%">:</td>
        <td><a href="{{ route('staff.pengajuan.berkas', ['id' => $detailSurat->id]) }}"><x-button.primary-button>Unduh Berkas</x-button.primary-button></a></td>
    </tr>
</table>
<!-- Pastikan MODAL ini ada di file Blade Anda. Jika sudah ada, JANGAN tambahkan lagi. -->
<div class="modal fade bs-example-modal-lg" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="pdfModalTitle">Preview Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="loadingSpinner" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p>Memuat dokumen...</p>
                </div>
                <!-- Iframe untuk menampilkan PDF -->
                <iframe id="pdfViewer" src="app/public/{{ $detailSurat->berkas }}" frameborder="0" width="100%" height="600px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

