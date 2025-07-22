<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Daftar surat keluar ditolak</h4>
        </div>

        <div class="card-body">
            <table id="contentTable" class="display table table-striped table-hover table-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th>Keterangan</th>
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
            table: "{{route('staff.pengajuankeluar.reject_datatablekeluar')}}"
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
                        data: 'keterangan',
                        name: 'keterangan',
                        orderable: false,
                        searchable: false,
                        defaultContent: '-',
                    }
                ]
            });

        }
    </script>
</x-app-layout>
