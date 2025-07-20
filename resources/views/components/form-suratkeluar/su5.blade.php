<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
    {{-- Container utama untuk membagi dua bagian --}}
    <div class="split-container">
        {{-- Bagian Kiri: Form --}}
        <div class="split-left">
            <form id="su5Form" method="POST" action="{{ route('desa.suratkeluar.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <x-text-input value="su5" name="jenis_surat" type="text" hidden />

                <div class="clearfix">
                    <h4 class="text-blue h4">SURAT UNDANGAN 1 -5</h4>
                </div>
                <div class="wizard-content">
                    <div id="formAlert" style="display:none;" class="alert alert-danger mb-3" role="alert">
                        <strong>Semua kolom wajib diisi, harap perhatikan lebih teliti.</strong>
                    </div>
                     <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-input-label><b>Nama Surat :</b> </x-input-label>
                            <x-text-input name="nama" type="text" class="form-control required-field" placeholder=" ex. Undangan Rapat" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tanggal Surat :</b>&nbsp; ex <em class="text-blue">( Bulukumba, 8 Juli 2025 )</em> </x-input-label>
                            <x-text-input name="nik" type="text" class="form-control required-field" 
                            placeholder="Bulukumba, 8 Juli 2025" />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Sifat :</b> </x-input-label>
                            <x-text-input name="sifat" type="text" class="form-control required-field" placeholder=" ex. Biasa" />
                            <x-input-error class="mt-2" :messages="$errors->get('sifat')" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Lampiran :</b>&nbsp; ex <em class="text-blue">( 1 (satu) Lembar )</em></x-input-label>
                            <x-text-input name="lampiran" type="text" class="form-control required-field" placeholder="1 (satu) Lembar" />
                            <x-input-error class="mt-2" :messages="$errors->get('lampiran')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Hal :</b> &nbsp; <em class="text-blue">( isikan tanda _ jika kosong )</em> </x-input-label>
                            <x-text-input name="perihal" type="text" class="form-control required-field" placeholder="_"/>
                            <x-input-error class="mt-2" :messages="$errors->get('perihal')" />
                        </div>
                    </div>

                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Yth :</b> </x-input-label>
                              <x-text-input name="yth" type="text" class="form-control required-field" placeholder="" />
                            <x-input-error class="mt-2" :messages="$errors->get('yth')" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Hari / Tanggal :</b> &nbsp; ex <em class="text-blue">( Selasa / 8 Juli 2025 )</em></x-input-label>
                            <x-text-input name="hari" type="text" class="form-control required-field" placeholder=" Selasa / 8 Juli 2025" />
                            <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Waktu :</b> &nbsp; ex <em class="text-blue">( 13:00 )</em></x-input-label>
                            <x-text-input name="waktu" type="text" class="form-control required-field" placeholder=" 13:00" />
                            <x-input-error class="mt-2" :messages="$errors->get('waktu')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tempat :</b> </x-input-label>
                            <x-text-input name="tempat" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat')" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Isi Surat :</b> 
                            <em class="text-blue"> &nbsp; ( ketik tanpa alenia paragraf dan buat baris baru jika lebih dari 1 paragraf )</em>
                            </x-input-label>
                            <textarea name="paragraf_1" type="textarea" class="ckeditor form-control required-field" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('paragraf_1')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Penekanan :</b> 
                            <em class="text-blue"> &nbsp; ( Kosongkan jika tidak diperlukan )</em>
                            </x-input-label>
                            <textarea name="paragraf_2" type="textarea" class="ckeditor form-control required-field" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('paragraf_2')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tembusan :</b> <em class="text-blue">( kosongkan jika tidak ada )</em> </x-input-label>
                            <textarea name="tembusan" type="textarea" class="ckeditor form-control required-field"></textarea>

                            <x-input-error class="mt-2" :messages="$errors->get('tembusan')" />
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Berkas Persyaratan (.zip / .rar) : [[ <a data-toggle="modal" data-target="#passwordModal" href="#">Lihat Syarat</a> ]]</x-input-label>
                            <x-text-input name="berkassuratkeluar" type="file" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('berkassuratkeluar')" />
                        </div>
                    </div> --}}
                
                    

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-button.primary-button>Submit</x-button.primary-button>
                    </div>
                </div>
            </section>

            {{-- <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
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
            </div> --}}

        </div>
    </form>
        </div>
        {{-- Bagian Kanan: Tampilan PDF --}}
        <div class="split-right">
            <h4 class="text-blue h5 mb-3">Ini adalah tampilan dokumen yang akan anda buat</h5>
            <div class="pdf-viewer">
                {{-- Placeholder untuk PDF. Anda mungkin perlu mengganti 'path/to/your/document.pdf' dengan URL dinamis. --}}
                <embed src="{{ route('public.pdf.show', ['filename' => 'surat_izin.pdf']) }}" type="application/pdf" width="100%" height="1200px" />
                <p class="text-muted mt-2">Perhatikan setiap detail isi form agar hasilnya sesuai struktur yang sudah ditentukan</p>
            </div>
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
        const form = document.getElementById('su5Form');
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