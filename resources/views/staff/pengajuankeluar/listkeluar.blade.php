<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Daftar surat keluar sudah dikonfirmasi</h4>
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
                                        <option value="Surat Undangan">Surat Undangan (SU)</option>
                                        <option value="Surat Undangan 5">Surat Undangan 1-5 (SU5)</option>
                                        <option value="Surat Perintah Tugas">Surat Perintah Tugas (SPT)</option>

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
                        <th>Nama Surat</th>
                        <th>Tgl Surat</th>
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
            table: "{{route('staff.pengajuankeluar.listkeluar_datatablekeluar')}}",
            download: "{{route('staff.pengajuankeluar.listkeluar_downloadkeluar')}}"
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
                                        if (row.keterangan) {
                                            return '<span class="badge badge-danger">Ditolak</span><br>Keterangan : ' + row.keterangan;
                                        } else {
                                            // If no 'keterangan', display 'Ditolak' with the badge
                                            return '<span class="badge badge-danger">Ditolak</span>';
                                        }
                                    case 'Dikonfirmasi':
                                        return '<span class="badge badge-primary">Menunggu-TTD-Kades</span>';
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
   
</x-app-layout>
