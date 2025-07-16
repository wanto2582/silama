<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-8 mb-30">
                <div class="card-box height-100-p pd-20">
                    <div style="width: 100%; height: 100vh">
                        <iframe src="data:application/pdf;base64,{{ base64_encode($pdfContent) }}" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p pd-20"> 
                    <h2 class="h4 mb-20">Aksi</h2>
                    
                    <button data-toggle="modal" data-target="#passwordModal" class="btn btn-primary btn-block mb-2">Tanda Tangani</button>
                    <button data-toggle="modal" data-target="#passwordModal1" class="btn btn-danger btn-block mb-2">Tolak</button>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Masukkan Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kades.pengajuankeluar.ttdkeluar', $pskeluar->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input name="ttdkeluar" type="password" class="form-control" id="passwordInput" placeholder="Masukkan password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="passwordModal1" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Alasan Ditolak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kades.pengajuankeluar.tolakkeluar', $pskeluar->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="keterangan" type="" class="form-control" placeholder="Masukkan Keterangan">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
   function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("note").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "Ditolak") {
            document.getElementById("note").style.display = "block";
        }
    }

</script>
