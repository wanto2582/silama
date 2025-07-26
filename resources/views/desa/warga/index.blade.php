<x-app-layout>
    <x-slot name="title">Data Warga</x-slot>
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Warga Desa Manyampa</h4>
        </div>
        <div class="card-body">
            <div class="h5 pd-20 mb-0">
                <x-button.primary-button class="btn btn-primary"><a href="{{ route('desa.warga.create') }}" style="text-decoration: none; color:white;"> Add Warga </a></x-button.primary-button>
           </div>
           
           {{-- <!DOCTYPE html>
<html lang="id"> --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Induk Penduduk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for table borders and alignment */
        table, th, td {
            border: 1px solid #e4e5e9; /* Tailwind's gray-200 */
            border-collapse: collapse;
        }
        th {
            text-align: center;
            vertical-align: top;
            color: #19191a; /* Tailwind's gray-700 */
            /* margin: -30px; */
            padding: 2px;
            background-color: #a4a5a7; /* Tailwind's gray-50 */
            font-weight: 600; /* Tailwind's font-semibold */
            color: #19191a; /* Tailwind's gray-700 */
            border: 1px solid #929497; /* Tailwind's gray-200 */
        }
        /* Ensure table is responsive */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 p-4 sm:p-6 md:p-8">

    <div class="max-w-full mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">BUKU INDUK PENDUDUK</h1>

        <div class="table-responsive">
            <table id="contentTable" class="min-w-full bg-white rounded-sm overflow-hidden" style="font-size: 13px; margin-left:2px;">
                <thead style="font-size: 13px; ">
                    <tr class="bg-gray-90">
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider rounded-tl-lg">NOMOR<br>URUT</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">NAMA<br>LENGKAP/<br>PANGGILAN</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">JENIS<br>KELAMIN</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">STATUS<br>PERKAWINAN</th>
                        <th colspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">TEMPAT &<br>TANGGAL<br>LAHIR</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">AGAMA</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">PENDIDIKAN<br>TERAKHIR</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">PEKERJAAN</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">DAPAT<br>MEMBACA<br>HURUF</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">KEWARGANEGARAAN</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">ALAMAT LENGKAP</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">KEDUDUKAN<br>DLM<br>KELUARGA</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">NIK</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">NOMOR<br>KK</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">KET</th>
                        <th rowspan="2" class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider rounded-tr-lg">AKSI</th>

                    </tr>
                    <tr class="bg-gray-50">
                        <th class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">TEMPAT<br>LAHIR</th>
                        <th class="px-1 py-1 text-xs font-medium text-black uppercase tracking-wider">TGL<br>LAHIR</th>
                    </tr>
                    <tr class="bg-yellow-100">
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">1</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">2</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">3</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">4</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">5</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">6</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">7</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">8</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">9</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">10</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">11</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">12</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">13</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">14</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">15</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium">16</td>
                        <td class="px-4 py-2 text-sm text-gray-700 font-medium"></td>
                    </tr>
                </thead>
                <tbody> 
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
                        url: "{{route('desa.warga_table')}}",
                        type: 'GET'
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // NOMOR URUT
                        { data: 'nama', name: 'nama' }, // NAMA LENGKAP/PANGGILAN
                        { data: 'jenis_kelamin', name: 'jenis_kelamin' }, // JENIS KELAMIN
                        { data: 'status_pernikahan', name: 'status_pernikahan' }, // STATUS PERKAWINAN
                        { data: 'tempat_lahir', name: 'tempat_lahir' }, // TEMPAT LAHIR
                        { data: 'tgl_lahir', name: 'tgl_lahir' }, // TGL
                        { data: 'agama', name: 'agama' }, // AGAMA
                        { data: 'pendidikan', name: 'pendidikan' }, // PENDIDIKAN TERAKHIR
                        { data: 'pekerjaan', name: 'pekerjaan' }, // PEKERJAAN
                        { data: 'dapat_membaca_huruf', name: 'dapat_membaca_huruf' }, // DAPAT MEMBACA HURUF
                        { data: 'kewarganegaraan', name: 'kewarganegaraan' }, // KEWARGANEGARAAN
                        { data: 'alamat', name: 'alamat' }, // ALAMAT LENGKAP
                        { data: 'kedudukan_dlm_keluarga', name: 'kedudukan_dlm_keluarga' }, // KEDUDUKAN DLM KELUARGA
                        { data: 'nik', name: 'nik' }, // NIK
                        { data: 'kk', name: 'kk' }, // NOMOR KK
                        { data: 'keterangan', name: 'keterangan' }, // KET
                        { data: 'action', name: 'action', orderable: false, searchable: false } // AKSI
                    ],
                    // Optional: Add more DataTables options for better UX
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": false, // Handled by overflow-x-auto on parent div
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json" // Indonesian language for DataTables
                    }
                });

                // Handle delete button click
                $(document).on('click', '.delete-btn', function(e) {
                    e.preventDefault();

                    const id = $(this).data('id');
                    const nama = $(this).data('nama');
                    const deleteUrl = '{{ route("desa.warga.destroy", ":id") }}'.replace(':id', id);

                    Swal.fire({
                        title: `Apa anda yakin akan menghapus "${nama}"?`,
                        text: "Anda tidak dapat mengembalikannya!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus saja!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: deleteUrl,
                                type: 'POST',
                                data: {
                                    _method: 'DELETE',
                                    _token: CSRF_TOKEN
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire(
                                            'Deleted!',
                                            response.message,
                                            'success'
                                        ).then(() => {
                                            table.ajax.reload();
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            response.message || 'Ada yang salah kayaknya.',
                                            'error'
                                        );
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        'Error!',
                                        'Terjadi kesalahan saat mencoba menghapus data.',
                                        'error'
                                    );
                                    console.error('AJAX Error:', xhr.responseText);
                                }
                            });
                        }
                    });
                });

            });
        }

        // Start initialization
        initDataTable();
    </script>
</x-app-layout>