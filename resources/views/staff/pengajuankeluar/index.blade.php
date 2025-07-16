<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Daftar surat keluar belum dikonfirmasi</h4>
        </div>
        <div class="card-body">
            

            <table id="contentTable" class="table table-striped table-hover table-responsive " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Nama Surat</th>
                        <th>Tgl Surat</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>
    <!-- Simple Datatable End -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var url = {
            table: "{{route('staff.pengajuankeluar.listkeluar_tablekeluar')}}", 
            download: "{{route('desa.suratkeluar.riwayat_downloadsuratkeluar')}}"
        };
        var table;


        $(document).ready(function() {
            var CSRF_TOKEN = "{{@csrf_token()}}";

            loadDataTablekeluar();

            $(document).on('click', '.submit-filter', function(e) {
                $('#formFilter').submit();
            });

            $(document).on('click', '.submit-download', function(e) {

                let nik = $('#nik').val(),
                    jenis_surat = $('#jenis_surat').val();
                let urlDownload = [];


                let finalUrl = url.download;
                let params = [];

                // Kondisi untuk filter nik
                if (nik) {
                    params.push(`nik=${nik}`);
                }

                // Kondisi untuk filter jenis_surat
                if (jenis_surat) {
                    params.push(`jenis_surat=${jenis_surat}`);
                }

                // Gabungkan parameter ke finalUrl
                if (params.length > 0) {
                    finalUrl = finalUrl + '?' + params.join('&');
                }


                window.open(finalUrl);


                // console.log(finalUrl);
                // $('#formFilter').submit();
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
                    $('#contentTable').dataTablekeluar().fnDestroy();
                    loadDataTablekeluar(nik, jenis_surat);
                    // let data = $('#formFilter').serialize();


                }
            });



        });


        function loadDataTablekeluar(nik, jenis_surat) {
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
                        name: 'id',
                        title: '#',
                        width: '2%'
                    },
                    {
                        data: 'detail_suratkeluars.nama',
                        name: 'detail_suratkeluars.nama',
                        defaultContent: '-'
                    },
                    {
                        data: 'detail_suratkeluars.nik',
                        name: 'detail_suratkeluars.nik',
                        defaultContent: '-'
                    },
                    {
                        data: 'detail_suratkeluars.jenis_surat',
                        name: 'detail_suratkeluars.jenis_surat',
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
                                        return '<span class="badge badge-danger">Ditolak</span>';
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        width: '15%'
                    },
                ]
            });

        }
    </script>
    <!-- <script>
        // Wait for jQuery to be loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Check if jQuery is loaded, if not wait for it
            function waitForJQuery() {
                if (typeof $ !== 'undefined') {
                    initializeFilter();
                } else {
                    setTimeout(waitForJQuery, 100);
                }
            }
            waitForJQuery();
        });

        function initializeFilter() {
            $(document).ready(function() {
                // Initialize DataTable
                var dataTable = $('.data-table').DataTable({
                    responsive: true,
                    searching: false, // Disable default search since we have custom filters
                    columnDefs: [{
                        targets: [6, 7], // Disable sorting for action column
                        orderable: false
                    }],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                    }
                });

                // Filter functionality
                $('.btn-filter').on('click', function(e) {
                    e.preventDefault();
                    performFilter();
                });

                // Reset functionality
                $('.btn-reset').on('click', function(e) {
                    e.preventDefault();
                    $('#formFilter')[0].reset();
                    performFilter();
                });

                // Allow filtering on Enter key press
                $('#nik').on('keypress', function(e) {
                    if (e.which === 13) { // Enter key
                        e.preventDefault();
                        performFilter();
                    }
                });

                // Filter on select change
                $('#jenis_surat').on('change', function() {
                    performFilter();
                });

                function performFilter() {
                    var formData = {
                        nik: $('#nik').val(),
                        jenis_surat: $('#jenis_surat').val(),
                        _token: '{{ csrf_token() }}'
                    };

                    $.ajax({
                        url: '{{ route("staff.pengajuan.index") }}',
                        type: 'GET',
                        data: formData,
                        beforeSend: function() {
                            // Show loading indicator
                            $('#table-body').html('<tr><td colspan="8" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat data...</td></tr>');
                        },
                        success: function(response) {
                            if (response.success) {
                                // Destroy existing DataTable first
                                if ($.fn.DataTable.isDataTable('.data-table')) {
                                    dataTable.destroy();
                                }

                                // Update table body with filtered data
                                $('#table-body').html(response.html);

                                // Small delay to ensure DOM is updated
                                setTimeout(function() {
                                    // Reinitialize DataTable
                                    dataTable = $('.data-table').DataTable({
                                        responsive: true,
                                        searching: false,
                                        columnDefs: [{
                                            targets: [6, 7],
                                            orderable: false
                                        }],
                                        language: {
                                            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                                        }
                                    });
                                }, 100);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Filter error:', error);
                            $('#table-body').html('<tr><td colspan="8" class="text-center text-danger">Terjadi kesalahan saat memfilter data.</td></tr>');
                        }
                    });
                }
            });
        }
    </script> -->

</x-app-layout>
