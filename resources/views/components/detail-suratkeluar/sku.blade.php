<h2 class="h4 mb-20">Detail - {{$detailSuratkeluar->jenis_surat}}</h2>

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
        <td width="30%">Nama Pengaju </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">NIK </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat, Tanggal Lahir </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->tempat_lahir .', '. \Carbon\Carbon::parse($detailSuratkeluar->tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Jenis Kelamin </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->gender ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Agama </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->agama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Warganegara </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->kewarganegaraan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat </td>
        <td width="1%">:</td>
        <td>{{'Dusun '. $detailSuratkeluar->dusun .', RT.'. $detailSuratkeluar->rt .', RW.'. $detailSuratkeluar->rw ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Keperluan </td>
        <td width="1%">:</td>
        <td>{{$detailSuratkeluar->tujuan ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Berkas </td>
        <td width="1%">:</td>
        <td><a href="{{ route('staff.pengajuan.berkassuratkeluar', ['id' => $detailSuratkeluar->id]) }}"><x-button.primary-button>Unduh Berkas</x-button.primary-button></a></td>
    </tr>
</table>
<p>Data Usaha :</p>
<table class="table table-bordered">
    <tr>
        <td width="30%">Nama Usaha </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nama_instansi ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Mulai Usaha </td>
        <td width="1%">:</td>
        <td>{{ \Carbon\Carbon::parse($detailSuratkeluar->mulai_usaha)->isoFormat('D MMMM YYYY') ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat Usaha </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->alamat_usaha}}</td>
    </tr>
    <tr>
        <td width="30%">Tujuan </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->tujuan}}</td>
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
                <iframe id="pdfViewer" src="app/public/{{ $detailSuratkeluar->berkassuratkeluar }}" frameborder="0" width="100%" height="600px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

 

