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
                    @if ($ps->status == 'Selesai')
                    <small>Surat ini sudah selesai</small>
                    @else
                    <button data-toggle="modal" data-target="#passwordModal" class="btn btn-primary btn-block mb-2">Konfirmasi</button>
                    <button data-toggle="modal" data-target="#passwordModal1" class="btn btn-danger btn-block mb-2">Tolak</button>
                    @endif
                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('staff.pengajuan.confirm', $ps->id) }}" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="Dikonfirmasi">
                <div class="modal-header">
                    <h5 class="modal-title">Masukkan Password</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input name="ttd" type="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
            </form>

        </div>
    </div>


    <div class="modal fade" id="passwordModal1" tabindex="-1" role="dialog" aria-labelledby="passwordModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('staff.pengajuan.confirm', $ps->id) }}" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="Ditolak">
                <div class="modal-header">
                    <h5 class="modal-title">Alasan Penolakan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan alasan penolakan" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
<script>
    // function showCard(selectedValue) {
    //     // Semua card disembunyikan terlebih dahulu
    //     document.getElementById("note").style.display = "none";

    //     // Tampilkan card sesuai dengan nilai yang dipilih
    //     if (selectedValue === "Ditolak") {
    //         document.getElementById("note").style.display = "block";
    //     }
    // }
    function showCard(val) {
        const note = document.getElementById("note");
        if (val === "Ditolak") {
            note.style.display = "block";
        } else {
            note.style.display = "none";
        }
    }

    function submitForm() {
        // Close modal first (optional UX)
        $('#passwordModal').modal('hide');

        // Submit the actual form
        document.getElementById("aksiForm").submit();
    }
</script>