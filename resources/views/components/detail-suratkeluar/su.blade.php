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

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.preview-berkas-btn', function() {
            var detailSuratkeluarId = $(this).data('id');
            // Pastikan route ini sesuai dengan route yang Anda buat di web.php
            // Contoh: 'staff.pengajuan.berkas' atau 'kades.pengajuan.berkas'
            var berkassuratkeluarUrl = "{{ route('staff.pengajuankeluar.berkassuratkeluar', ':id') }}";
            berkassuratkeluarUrl = berkassuratkeluarUrl.replace(':id', detailSuratkeluarId);

            console.log('staff.berkassuratkeluar', ':id', berkassuratkeluarUrl); // DEBUGGING: Cek URL di console

            // Tampilkan spinner loading
            $('#loadingSpinner').show();
            $('#pdfViewer').hide().attr('src', ''); // Sembunyikan dan kosongkan src iframe sebelum memuat yang baru

            // Set judul modal
            $('#pdfModalTitle').text('Preview Berkas Pendukung');

            // Set src iframe
            $('#pdfViewer').attr('src', berkassuratkeluarUrl);

            // Sembunyikan spinner dan tampilkan iframe setelah iframe selesai memuat
            $('#pdfViewer').on('load', function() {
                console.log('Iframe berhasil memuat konten.'); // DEBUGGING: Konfirmasi load event
                $('#loadingSpinner').hide();
                $(this).show();
            }).on('error', function() { // Menambahkan event error untuk debugging
                console.error('Gagal memuat konten iframe. Cek URL dan respons server.'); // DEBUGGING: Error loading
                $('#loadingSpinner').hide();
                // Opsional: Tampilkan pesan error di modal
                // $('#pdfViewer').after('<p class="text-danger">Gagal memuat berkas. Pastikan file ada dan formatnya benar.</p>');
            });
        });

        // Reset iframe src saat modal ditutup untuk menghentikan pemuatan jika masih berjalan
        $('#pdfPreviewModal').on('hidden.bs.modal', function() {
            $('#pdfViewer').attr('src', ''); // Kosongkan src untuk menghentikan loading
            $('#loadingSpinner').hide(); // Pastikan spinner tersembunyi
            $('#pdfViewer').off('load').off('error'); // Hapus event listener untuk menghindari duplikasi
        });
    });
</script>
@endpush
