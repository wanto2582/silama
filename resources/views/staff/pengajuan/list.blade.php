<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Daftar surat sudah dikonfirmasi</h4>
        </div>
        <div class="card-body">
            <!-- Filter Form -->
            <form action="" id="formFilter">
                <div class="col-md-6 pl-2 mt-2">
                    <div class="row">
                        <div class="col-12">

                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="jenis_surat">Jenis Surat</label>
                                </div>
                                <div class="col-sm-6">
                                    <select name="jenis_surat" id="jenis_surat" class="form-control" style="width: 100%; height: 38px">
                                        <option value="">Pilih Jenis Surat</option>
                                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili (SKD)</option>
                                        <option value="Surat Keterangan Sakit">Surat Keterangan Sakit (SKS)</option>
                                        <option value="Surat Keterangan Kematian">Surat Keterangan Kematian (SKK)</option>
                                        <option value="Surat Keterangan Kepemilikan Kendaraan">Surat Keterangan Kepemilikan Kendaraan (SKKK)</option>
                                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu (SKTM)</option>
                                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha (SKU)</option>
                                        <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran (SKL)</option>
                                        <option value="Surat Pernyataan a">Surat Keterangan Usaha (SKU)</option>
                                        <option value="Surat Pernyataan b">Surat Keterangan Usaha (SKU)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="nik">NIK</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK">
                                </div>
                            </div>

                        </div>

                        <div class="col-9">
                            <div class="form-group row pull-right ">

                                <button type="button" class="btn btn-rounded btn-success text-bold submit-download" style="float: right !important;">
                                    <span>Download</span>
                                </button>

                                <button type="button" class="btn btn-rounded btn-primary text-bold submit-filter" style="float: right !important;">
                                    Filter
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <!-- End Filter Form -->

            <table id="contentTable" class="display table table-striped table-hover table-responsive" style="width:100%">
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
    <!-- Simple Datatable End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var url = {
            table: "{{route('staff.pengajuan.list_datatable')}}",
            download: "{{route('staff.pengajuan.list_download')}}"
        };
        var table;


        $(document).ready(function() {
            var CSRF_TOKEN = "{{@csrf_token()}}";

            loadDataTable();

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
                                        return '<span class="badge badge-primary" title="Menunggu TTD Kades">Menunggu-TTD-Kades</span>';
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
                        width: '15%',
                        render: function(data, type, row) {
                            let buttons = data; // Aksi dari server
                            if (row.status === 'Dikonfirmasi') {
                                // Nomor WhatsApp tujuan (ganti dengan nomor admin/staff yang sesuai)
                                const waNumber = '6281287070092';
                                const letterType = data['detail_surats.jenis_surat'];

                                // Pesan WhatsApp yang akan dikirim
                                const message = `Yth. Kepala Desa Manyampa ,\n\nDengan hormat, \nBahwa ada pengajuan yang "Menunggu Tanda Tangan".\n Mohon untuk dapat segera ditindaklanjuti.\n\nTerima kasih.`;

                                // Buat URL WhatsApp
                                const waLink = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;

                                // Tambahkan tombol notifikasi WhatsApp ke dalam daftar aksi
                                buttons += ` <a href="${waLink}" target="_blank" class="btn btn-warning btn-sm" title="Kirim notifikasi ke Kades via WhatsApp">kirim WA</a>`;
                            }
                            return buttons;
                        }
                    },
                ]
            });

        }
    </script>
    <!-- <script type="text/javascript">
        console.log('Script loaded');
        console.log('jQuery available:', typeof $);

        // Wait for jQuery to be available
        function initDataTable() {
            if (typeof $ === 'undefined') {
                console.log('jQuery not loaded yet, waiting...');
                setTimeout(initDataTable, 100);
                return;
            }

            console.log('jQuery loaded, initializing...');

            $(document).ready(function() {
                var CSRF_TOKEN = "{{@csrf_token()}}";
                console.log('masuk ajax - document ready');

                // Initialize DataTable directly without separate function
                var table = $('#contentTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{route('staff.pengajuan.list_datatable')}}",
                        type: 'GET',
                        data: function(d) {
                            d.nik = $('#nik').val();
                            d.jenis_surat = $('#jenis_surat').val();
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
                                            let keterangan = row.keterangan ? row.keterangan : '';
                                            let statusHtml = '<span class="badge badge-danger">Ditolak</span>';
                                            if (keterangan) {
                                                statusHtml += '<br><small style="font-size: 11px; color: #666;">Keterangan: ' + keterangan + '</small>';
                                            }
                                            return statusHtml;
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
                            searchable: false
                        }
                    ]
                });

                // Filter functionality
                $('.btn-filter').on('click', function(e) {
                    e.preventDefault();
                    table.ajax.reload();
                });

                // Reset functionality
                $('.btn-reset').on('click', function(e) {
                    e.preventDefault();
                    $('#formFilter')[0].reset();
                    table.ajax.reload();
                });

                // Allow filtering on Enter key press
                $('#nik').on('keypress', function(e) {
                    if (e.which === 13) { // Enter key
                        e.preventDefault();
                        table.ajax.reload();
                    }
                });

                // Filter on select change
                $('#jenis_surat').on('change', function() {
                    table.ajax.reload();
                });

            });
        }

        // Start initialization
        initDataTable();
    </script> -->
</x-app-layout>
