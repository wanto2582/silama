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
           </a>
        </td>
    </tr>
</table>
<br>
<table class="table table-bordered">
    <tr>
        <td width="30%">Nama Pengaju</td>
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
        <td>{{ $detailSurat->tempat_lahir .', '. \Carbon\Carbon::parse($detailSurat->tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Jenis Kelamin </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->gender ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Agama </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->agama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Warganegara </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->kewarganegaraan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat </td>
        <td width="1%">:</td>
        <td>{{'Dusun '. $detailSurat->dusun .', RT.'. $detailSurat->rt .', RW.'. $detailSurat->rw ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Keperluan </td>
        <td width="1%">:</td>
        <td>{{$detailSurat->tujuan ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Berkas </td>
        <td width="1%">:</td>
        <td>
            @if($detailSurat->berkas)
                {{-- Tombol Unduh Berkas --}}
                <a href="{{ route('staff.pengajuan.berkas', ['id' => $detailSurat->id]) }}" target="_blank">
                    <x-button.primary-button>Unduh Berkas</x-button.primary-button>
                </a>
                {{-- Tombol Preview Berkas --}}
                <button class="btn btn-info ml-2 preview-berkas-btn"
                        data-toggle="modal"
                        data-target="#pdfPreviewModal"
                        data-id="{{ $detailSurat->id }}"
                        title="Preview Berkas">
                    <i class="dw dw-eye"></i> Preview Berkas
                </button>
            @else
                - Tidak ada berkas -
            @endif
        </td>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.preview-berkas-btn', function() {
            var detailSuratId = $(this).data('id');
            // Pastikan route ini sesuai dengan route yang Anda buat di web.php
            // Contoh: 'staff.pengajuan.berkas' atau 'kades.pengajuan.berkas'
            var berkasUrl = "{{ route('staff.pengajuan.berkas', ':id') }}";
            berkasUrl = berkasUrl.replace(':id', detailSuratId);

            console.log('staff.berkas', ':id', berkasUrl); // DEBUGGING: Cek URL di console

            // Tampilkan spinner loading
            $('#loadingSpinner').show();
            $('#pdfViewer').hide().attr('src', ''); // Sembunyikan dan kosongkan src iframe sebelum memuat yang baru

            // Set judul modal
            $('#pdfModalTitle').text('Preview Berkas Pendukung');

            // Set src iframe
            $('#pdfViewer').attr('src', berkasUrl);

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
        $('#pdfPreviewModal').on('hidden.bs.modal', function () {
            $('#pdfViewer').attr('src', ''); // Kosongkan src untuk menghentikan loading
            $('#loadingSpinner').hide(); // Pastikan spinner tersembunyi
            $('#pdfViewer').off('load').off('error'); // Hapus event listener untuk menghindari duplikasi
        });
    });
</script>
@endpush