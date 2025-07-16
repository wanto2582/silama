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
        <td width="30%">Dasar  Surat</td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->paragraf_1 ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tgl Surat </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nik ?? '' }}</td>
    </tr>
     <tr>
        <td width="30%">Nama (Yg ditugaskan) </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->yth ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">NIP </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nip ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Pangkat/Golongan </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->pangkat_golongan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Jabatan </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->jabatan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Untuk </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->perihal ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tempat </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tempat ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Lama Perjalanan </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->lama_perjalanan ?? '' !!}</td>
    </tr>
     <tr>
        <td width="30%">Tgl Berangkat </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tgl_berangkat ?? '' !!}</td>
    </tr>
     <tr>
        <td width="30%">Tgl Kembali </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tgl_pulang ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tembusan </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tembusan ?? '' !!}</td>
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



