<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Daftar surat sudah dikonfirmasi</h4>
        </div>
        <div class="modal fade bs-example-modal-lg" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="pdfModalTitle">Preview Dokumen Surat Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="loadingSpinner" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p>Memuat dokumen...</p>
                </div>
                <iframe id="pdfViewer" src="" frameborder="0" width="100%" height="600px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

        <div class="card-body">
            <table id="contentTable" class="table table-striped table-hover table-responsive " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    
@push('scripts')
<script>
    $(document).ready(function() {
        // Tangani klik tombol preview
        $(document).on('click', '.preview-btn', function() {
            var pengajuanId = $(this).data('id');
            var jenisSurat = $(this).data('name');
            var pdfUrl = "{{ route('kades.pengajuan.preview_pdf', ':id') }}";
            pdfUrl = pdfUrl.replace(':id', pengajuanId);

            // Tampilkan spinner loading
            $('#loadingSpinner').show();
            $('#pdfViewer').hide(); // Sembunyikan iframe saat loading

            // Set judul modal
            $('#pdfModalTitle').text('Preview Dokumen Surat ' + jenisSurat);

            // Set src iframe
            $('#pdfViewer').attr('src', pdfUrl);

            // Sembunyikan spinner dan tampilkan iframe setelah iframe selesai memuat
            // Ini mungkin tidak bekerja sempurna di semua browser/skenario,
            // tapi ini adalah pendekatan umum.
            $('#pdfViewer').on('load', function() {
                $('#loadingSpinner').hide();
                $(this).show();
            });
        });

        // Reset iframe src saat modal ditutup untuk menghentikan pemuatan jika masih berjalan
        $('#pdfPreviewModal').on('hidden.bs.modal', function () {
            $('#pdfViewer').attr('src', ''); // Clear src to stop loading
            $('#loadingSpinner').hide(); // Pastikan spinner tersembunyi
        });
    });
</script>
@endpush
    <!-- Simple Datatable End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var url = {
            table: "{{route('kades.pengajuan.list_datatable')}}"
        };
        var table;


        $(document).ready(function() {
            var CSRF_TOKEN = "{{@csrf_token()}}";

            loadDataTable();

            $(document).on('click', '.submit-filter', function(e) {
                $('#formFilter').submit();
            });

            $('#formFilter').validate({ // initialize the plugin
                rules: {
                    start_date: {
                        required: false,
                    },
                    end_date: {
                        required: false,
                    },
                },
                submitHandler: function(form) {
                    let nik = $('#nik').val(),
                        jenis_surat = $('#jenis_surat').val();

                    console.log(nik, jenis_surat);
                    $('#contentTable').dataTable().fnDestroy();
                    loadDataTable(nik, jenis_surat);
                    // let data = $('#formFilter').serialize();


                }
            });



        });


        function loadDataTable(nik, jenis_surat) {
            table = $('#contentTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
                ajax: {
                    type: 'GET',
                    url: url.table,
                    data: {
                        'nik': nik,
                        'jenis_surat': jenis_surat,
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'detail_surats.nama',
                        name: 'detail_surats.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'detail_surats.nik',
                        name: 'detail_surats.nik',
                        defaultContent: '-'
                    },
                    {
                        data: 'detail_surats.jenis_surat',
                        name: 'detail_surats.jenis_surat',
                        defaultContent: '-',
                        'searchable': true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        defaultContent: '-',
                        'searchable': false,
                        render: function(data, type, row) {
                            if (type === 'display') {
                                switch (data) {
                                    case 'Diproses':
                                        return '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                    case 'Ditolak':
                                        if (row.keterangan) {
                                            return '<span class="badge badge-danger">Ditolak</span><br>Keterangan : ' + row.keterangan;
                                        } else {
                                            // If no 'keterangan', display 'Ditolak' with the badge
                                            return '<span class="badge badge-danger">Ditolak</span>';
                                        }
                                    case 'Dikonfirmasi':
                                        return '<span class="badge badge-primary">Ttd</span>';
                                    case 'Selesai':
                                        return '<span class="badge badge-success">Selesai</span>';
                                    case 'Expired':
                                        return '<span class="badge badge-danger">Expired</span>';
                                    default:
                                        return data || '-';
                                }
                            }
                            return data;
                        }
                    },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            // Tombol preview
                            var previewBtn = '<a href="#" class="btn btn-icon btn-primary mr-1 mb-1 preview-btn" data-toggle="modal" data-target="#pdfPreviewModal" data-id="'+row.id+'" data-name="'+(row.detail_surats ? row.detail_surats.jenis_surat : '-')+'" title="Preview Surat"><i class="dw dw-eye" style="font-size: 2vh !important;"></i></a>';
                            // Tombol download dari backend (jika ada)
                            var actionBtn = row.action ? row.action : '';
                            return previewBtn + actionBtn;
                        }
                    }
                ]
            });

        }
    </script>
</x-app-layout>
