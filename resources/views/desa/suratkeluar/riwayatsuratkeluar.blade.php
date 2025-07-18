<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Riwayat Surat Keluar</h4>
        </div>
        <div class="card-body">
            <form action="" id="formFilter" class="mb-4">
                <div class="row">
                    <div class="col-md-4 col-12 mb-2">
                        <label for="jenis_surat" class="font-weight-bold">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat" class="form-control">
                            <option value="">Pilih Jenis Surat</option>
                            <option value="Surat Undangan">Surat Undangan (SU)</option>
                            <option value="Surat Undangan 1-5">Surat Undangan (SU5)</option>
                            <option value="Surat Perintah Tugas">Surat Perintah Tugas (SPT)</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-12 mb-2">
                        <label for="nik" class="font-weight-bold">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK">
                    </div>
                    <div class="col-md-4 col-12 d-flex align-items-end justify-content-md-end justify-content-start mt-md-0 mt-2">
                        <button type="button" class="btn btn-success btn-rounded font-weight-bold mr-2 submit-download shadow-sm flex-fill" style="min-width: 120px;">
                            <i class="fa fa-download mr-1"></i> Download
                        </button>
                        <button type="button" class="btn btn-primary btn-rounded font-weight-bold submit-filter shadow-sm flex-fill" style="min-width: 120px;">
                            <i class="fa fa-filter mr-1"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
            <style>
                @media (max-width: 767.98px) {
                    #formFilter .btn {
                        min-width: 100px !important;
                        margin-bottom: 8px;
                    }
                    #formFilter .d-flex {
                        flex-direction: column !important;
                        align-items: stretch !important;
                    }
                }
            </style>
            <table id="contentTable" class="display table table-striped table-hover table-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                         <th>Nama Surat</th>
                        <th>Tgl Surat</th>
                        <th>Tujuan</th>
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
            table: "{{route('desa.suratkeluar.riwayat_tablesuratkeluar')}}",
            download: "{{route('desa.suratkeluar.riwayat_downloadsuratkeluar')}}"
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
                        data: 'detail_suratkeluars.yth',
                        name: 'detail_suratkeluars.yth',
                        defaultContent: '-',
                        render: function(data, type, row) {
                            if (type === 'display' && data) {
                                // Menghilangkan tag HTML dan menampilkan sebagai teks biasa
                                var div = document.createElement("div");
                                div.innerHTML = data;
                                return div.textContent || div.innerText || "-";
                            }
                            return data || '-';
                        }
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        width: '15%',
                        render: function(data, type, row) {
                            let buttons = data; // Aksi dari server
                            if (row.status === 'Diproses') {
                                // Nomor WhatsApp tujuan (ganti dengan nomor admin/staff yang sesuai)
                                const waNumber = '6281287070092';
                                const letterType = data['detail_suratkeluars.jenis_surat'];

                                // Pesan WhatsApp yang akan dikirim
                                const message = `Yth. Sekdes Manyampa ,\n\nDengan hormat, saya memberitahukan bahwa ada pengajuan yang "Menunggu Konfirmasi". Mohon untuk dapat segera ditindaklanjuti.\n\nTerima kasih.`;

                                // Buat URL WhatsApp
                                const waLink = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;

                                // Tambahkan tombol notifikasi WhatsApp ke dalam daftar aksi
                                buttons += ` <a href="${waLink}" target="_blank" class="btn btn-warning btn-sm" title="Kirim notifikasi ke Staf via WhatsApp">kirim WA</a>`;
                            }
                            return buttons;
                        }
                    },
                ],
                // MENAMBAHKAN PENGURUTAN DEFAULT AGAR DATA TERBARU BERADA DI ATAS
                // MENGURUTKAN BERDASARKAN KOLOM PERTAMA ('#') SECARA DESCENDING
                order: [[0, 'desc']]
            });
        }
    </script>

</x-app-layout>
