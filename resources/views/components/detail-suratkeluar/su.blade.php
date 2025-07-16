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
        <td width="30%">Tgl Surat</td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Sifat </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->sifat ?? '' }}</td>
    </tr>
     <tr>
        <td width="30%">Lampiran </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->lampiran ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Hal </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->perihal ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Yth </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->yth ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Hari </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->hari ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Waktu </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->waktu ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tempat ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Isi surat </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->paragraf_1 ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Penekanan </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->paragraf_2 ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tembusan </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tembusan ?? '' !!}</td>
    </tr>
    
</table>

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

