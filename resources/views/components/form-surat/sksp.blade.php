<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
    {{-- Container utama untuk membagi dua bagian --}}
    <div class="split-container">
        {{-- Bagian Kiri: Form --}}
        <div class="split-left">
            <form id="sptnForm" method="POST" action="{{ route('desa.surat.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <x-text-input value="sksp" name="jenis_surat" type="text" hidden />

                <div class="clearfix">
                    <h4 class="text-blue h4">SURAT KESEPAKATAN</h4>
                </div>
                <div class="wizard-content">
                    <div id="formAlert" style="display:none;" class="alert alert-danger mb-3" role="alert">
                        <strong>Semua kolom wajib diisi, harap perhatikan lebih teliti.</strong>
                    </div>
                    <section>
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-input-label>No Surat : {{$nextId}}</x-input-label>
                                        <x-text-input name="nomor_surat" type="text" class="form-control" />
                                        <!-- <x-input-error class="mt-2" :messages="$errors->get('no_surat')" /> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-input-label>Nama/perihal:</x-input-label>
                                        <x-text-input id="tujuan" name="tujuan" type="text" class="form-control" required autofocus autocomplete="Tujuan" />
                                        <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-input-label>Jenis Surat :</x-input-label>
                                        <x-text-input type="text" class="form-control" value="Surat Kesepakatan" disabled required autofocus autocomplete="jenis_surat" />
                                        <x-input-error class="mt-2" :messages="$errors->get('jenis_surat')" />
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <x-input-label>Asal Surat :</x-input-label>
                                        <x-text-input id="surat_dari" name="surat_dari" type="text" class="form-control" value="{{old('surat_dari', $suratMasuk->surat_dari ?? '')}}" required autofocus autocomplete="surat_dari" />
                                        <x-input-error class="mt-2" :messages="$errors->get('surat_dari')" />
                                    </div>
                                </div> -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-input-label>File PDF Surat :</x-input-label>
                                        <x-text-input name="file" type="file" class="form-control" accept=".pdf" />
                                        <small class="form-text text-muted">Upload file PDF surat (maksimal 5MB)</small>
                                        @if(isset($suratMasuk) && $suratMasuk->file_pdf)
                                        <div class="mt-2">
                                            <small class="text-info">
                                                <i class="fa fa-file-pdf-o"></i>
                                                File saat ini: <a href="{{ asset('storage/' . $detailSurat->file_kesepakatan) }}" target="_blank">{{ basename($suratMasuk->file_kesepakatan) }}</a>
                                            </small>
                                        </div>
                                        @endif
                                        <x-input-error class="mt-2" :messages="$errors->get('file_pdf')" />
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <x-input-label>Keterangan :</x-input-label>
                                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)">{{old('keterangan', $suratMasuk->keterangan ?? '')}}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                </div>
                            </div> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-button.primary-button>Submit</x-button.primary-button>
                            </div>
                        </div>

                    </section>

                    <div class="modal fade" id="passwordModal3" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="passwordModalLabel">Berkas Persyaratan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    - Kartu Tanda Penduduk
                                    <br>
                                    - Kartu Keluarga
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .required-field.is-invalid,
    .required-field.is-invalid:focus,
    .required-field.is-invalid:active {
        border: 2px solid #dc3545 !important;
        background-color: #ffe6e6 !important;
    }

    .alert-danger {
        background: linear-gradient(90deg, #ff5858 0%, #f09819 100%);
        color: #fff;
        border: none;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.15);
    }

    /* CSS baru untuk layout dua kolom */
    .split-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .split-left {
        flex: 1;
        min-width: 400px;
        padding-right: 15px;
        border-right: 1px solid #eee;
    }

    .split-right {
        flex: 1;
        min-width: 400px;
        padding-left: 15px;
    }

    .pdf-viewer {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .split-left .col-md-6 {
        width: 100%;
    }

    .split-left .col-md-4,
    .split-left .col-md-1 {
        width: 100%;
    }

    @media (max-width: 1024px) {
        .split-container {
            flex-direction: column;
        }

        .split-left,
        .split-right {
            min-width: unset;
            width: 100%;
            padding: 0;
            border-right: none;
            border-bottom: 1px solid #eee;
        }

        .split-right {
            border-bottom: none;
        }

        .split-left {
            padding-bottom: 20px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('sptnForm');
        const alertBox = document.getElementById('formAlert');
        form.addEventListener('submit', function(e) {
            let valid = true;
            alertBox.style.display = 'none';
            const requiredFields = form.querySelectorAll('.required-field');
            requiredFields.forEach(function(field) {
                let value = field.value;
                if (field.tagName === 'SELECT') {
                    if (value === '' || value.toLowerCase().includes('pilih')) {
                        field.classList.add('is-invalid');
                        valid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                } else if (field.type === 'file') {
                    if (!field.value) {
                        field.classList.add('is-invalid');
                        valid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                } else {
                    if (!value || value.trim() === '') {
                        field.classList.add('is-invalid');
                        valid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                }
            });

            if (!valid) {
                alertBox.style.display = 'block';
                e.preventDefault();
                form.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>