<x-app-layout>
    <x-slot name="title">Data Warga</x-slot>
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Warga</h4>
        </div>
        <div class="card-body">
            <div class="h5 pd-20 mb-0">
                <x-button.primary-button class="btn btn-primary"><a href="{{ route('desa.warga.create') }}" style="text-decoration: none; color:white;"> Add Warga </a></x-button.primary-button>
           </div>
           
            <div class="table-responsive">  

                 <table id="contentTable" class="display table table-striped table-hover table-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                          <th >Nama</th>
                            <th >NIK</th>
                            <th >Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
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
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'nik',
                            name: 'nik'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
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