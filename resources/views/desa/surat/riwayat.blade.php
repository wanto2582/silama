<x-app-layout>
    <x-slot name="title">RIWAYAT PENGAJUAN</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30 shadow-lg rounded-lg border-primary">
        <div class="pd-20 border-bottom pb-3 mb-4 d-flex align-items-center">
            <i class="icon-copy dw dw-history mr-3 text-blue" style="font-size: 2.5rem;"></i>
            <div class="flex-grow-1">
                <h4 class="text-blue h4 mb-1">RIWAYAT PENGAJUAN</h4>
                <p class="mb-0 text-muted">LIHAT DAN KELOLA RIWAYAT PENGAJUAN SURAT ANDA DI SINI.</p>
            </div>
        </div>
        <div class="card-body py-4 px-4">
            <form action="" id="formFilter">
                <div class="row mb-4 align-items-end">
                    <div class="col-md-5">
                        <div class="form-group mb-0">
                            <label for="jenis_surat" class="col-form-label font-weight-bold text-uppercase">JENIS SURAT</label>
                            <select name="jenis_surat" id="jenis_surat" class="form-control custom-select shadow-sm rounded" style="width: 100%; height: 45px">
                                <option value="">PILIH JENIS SURAT</option>
                                <option value="Surat Keterangan Domisili">SURAT KETERANGAN DOMISILI (SKD)</option>
                                <option value="Surat Keterangan Sakit">SURAT KETERANGAN SAKIT (SKS)</option>
                                <option value="Surat Keterangan Kematian">SURAT KETERANGAN KEMATIAN (SKK)</option>
                                <option value="Surat Keterangan Kepemilikan Kendaraan">SURAT KETERANGAN KEPEMILIKAN KENDARAAN (SKKK)</option>
                                <option value="Surat Keterangan Tidak Mampu">SURAT KETERANGAN TIDAK MAMPU (SKTM)</option>
                                <option value="Surat Keterangan Usaha">SURAT KETERANGAN USAHA (SKU)</option>
                                <option value="Surat Keterangan Kelahiran">SURAT KETERANGAN KELAHIRAN (SKL)</option>
                                <option value="Surat Pernyataan">SURAT PERNYATAAN (SPTN)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group mb-0">
                            <label for="nik" class="col-form-label font-weight-bold text-uppercase">NIK</label>
                            <input type="text" class="form-control shadow-sm rounded" id="nik" name="nik" placeholder="MASUKKAN NIK">
                        </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-end">
                        <button type="button" class="btn btn-primary text-bold submit-filter w-100 mr-2 rounded-pill shadow-sm">
                            <i class="icon-copy dw dw-search"></i> FILTER
                        </button>
                        <button type="button" class="btn btn-success text-bold submit-download w-100 rounded-pill shadow-sm">
                             download
                        </button>
                    </div>
                    
                </div>
            </form>
            <hr class="my-4">
            <div class="table-responsive">
                <table id="contentTable" class="display table table-striped table-hover table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="table-plus text-uppercase font-weight-bold">#</th>
                            <th class="text-uppercase font-weight-bold">NAMA</th>
                            <th class="text-uppercase font-weight-bold">NIK</th>
                            <th class="text-uppercase font-weight-bold">JENIS SURAT</th>
                            <th class="text-uppercase font-weight-bold">STATUS</th>
                            <th class="datatable-nosort text-uppercase font-weight-bold">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Simple Datatable End -->
    <!-- DATATABLES CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- DATATABLES JAVASCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        var url = {
            table: "{{route('desa.surat.riwayat_table')}}",
            download: "{{route('desa.surat.riwayat_download')}}"
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
                let finalUrl = url.download;
                let params = [];

                // KONDISI UNTUK FILTER NIK
                if (nik) {
                    params.push(`nik=${nik}`);
                }

                // KONDISI UNTUK FILTER JENIS_SURAT
                if (jenis_surat) {
                    params.push(`jenis_surat=${jenis_surat}`);
                }

                // GABUNGKAN PARAMETER KE FINALURL
                if (params.length > 0) {
                    finalUrl = finalUrl + '?' + params.join('&');
                }

                window.open(finalUrl);
            });

            $('#formFilter').validate({ // INITIALIZE THE PLUGIN
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

                    $('#contentTable').dataTable().fnDestroy();
                    loadDataTable(nik, jenis_surat);
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
                                        return '<span class="badge badge-warning text-uppercase">MENUNGGU KONFIRMASI</span>';
                                    case 'Ditolak':
                                        if (row.keterangan) {
                                            return '<span class="badge badge-danger text-uppercase">DITOLAK</span><br>KETERANGAN : ' + row.keterangan.toUpperCase();
                                        } else {
                                            return '<span class="badge badge-danger text-uppercase">DITOLAK</span>';
                                        }
                                    case 'Dikonfirmasi':
                                        return '<span class="badge badge-primary text-normal" title="Sudah dikonfirmasi Sekdes">Menunggu-TTD-Kades</span>';
                                    case 'Selesai':
                                        return '<span class="badge badge-success text-uppercase" title="Surat selesai ditandatangani">SELESAI</span>';
                                    case 'Expired':
                                        return '<span class="badge badge-danger text-uppercase">EXPIRED</span>';
                                    default:
                                        return (data || '-').toUpperCase();
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
                                const letterType = data['detail_surats.jenis_surat'];

                                // Pesan WhatsApp yang akan dikirim
                                const message = `Yth. Sekdes Manyampa ,\n\nDengan hormat, \n Bahwa ada pengajuan yang "Menunggu Konfirmasi". \n Mohon untuk dapat segera ditindaklanjuti.\n\nTerima kasih.`;

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
