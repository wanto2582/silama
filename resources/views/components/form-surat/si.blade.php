<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
    {{-- Container utama untuk membagi dua bagian --}}
    <div class="split-container">
        {{-- Bagian Kiri: Form --}}
        <div class="split-left">
            <form id="siForm" method="POST" action="{{ route('desa.surat.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <x-text-input value="si" name="jenis_surat" type="text" hidden />

                <div class="clearfix">
                    <h4 class="text-blue h4">SURAT IZIN</h4>
                </div>
                <div class="wizard-content">
                    <div id="formAlert" style="display:none;" class="alert alert-danger mb-3" role="alert">
                        <strong>Semua kolom wajib diisi, harap perhatikan lebih teliti.</strong>
                    </div>
                    <section>
                        <div class="row">
                            <div class="col-md-12"> {{-- Menggunakan col-md-12 agar semua form group tetap dalam satu kolom di sisi kiri --}}
                                <div class="form-group">
                                    <x-input-label>Nama Surat : <em class="text-blue">( tulis dengan huruf kapital )</em></x-input-label>
                                    <x-text-input name="nama_surat" type="text" class="form-control required-field" placeholder="SURAT PENGANTAR ...." />
                                    <x-input-error class="mt-2" :messages="$errors->get('nama_surat')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama : </x-input-label>
                                    <x-text-input name="nama" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>NIK : </x-input-label>
                                    <x-text-input name="nik" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin :</label>
                                    <select name="gender" class="form-control required-field">
                                        <option>Pilih Jenis Kelamin</option>
                                        <option value="Laki - Laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tempat Lahir : </x-input-label>
                                    <x-text-input name="tempat_lahir" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tanggal Lahir : </x-input-label>
                                    <x-text-input name="tanggal_lahir" type="date" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Agama : </x-input-label>
                                    <select name="agama" class="form-control required-field">
                                        <option>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Kewarganegaraan : </x-input-label>
                                    <x-text-input name="kewarganegaraan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('kewarganegaraan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Pekerjaan : </x-input-label>
                                    <x-text-input name="pekerjaan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Pernikahan :</label>
                                    <select name="status_pernikahan" class="form-control required-field">
                                        <option>Pilih Status Pernikahan</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Pernah Menikah">Pernah Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <select name="dusun" class="form-control required-field">
                                        <option>Pilih Dusun</option>
                                        <option value="Alaraya">Alaraya</option>
                                        <option value="Tanah Eja">Tanah Eja</option>
                                        <option value="Dongi">Dongi</option>
                                        <option value="Mampua">Mampua</option>
                                        <option value="Luppung">Luppung</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>RT</label>
                                    <select name="rt" class="form-control required-field">
                                        <option>RT</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>RW</label>
                                    <select name="rw" class="form-control required-field">
                                        <option>RW</option>
                                        @for ($i = 1; $i <= 15; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama acara : </x-input-label>
                                    <x-text-input name="jenis_kegiatan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('jenis_kegiatan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tempat pelaksanaan : </x-input-label>
                                    <x-text-input name="lokasi_kegiatan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('lokasi_kegiatan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Hari/tanggal pelaksanaan : </x-input-label>
                                    <x-text-input name="waktu_kegiatan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('waktu_kegiatan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Jenis hiburan : </x-input-label>
                                    <x-text-input name="jenis_hiburan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('jenis_hiburan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Berkas Persyaratan (.zip / .rar) : [[ <a data-toggle="modal" data-target="#passwordModal3" href="#">Lihat Syarat</a> ]]</x-input-label>
                                    <x-text-input name="berkas" type="file" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('berkas')" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-input-label>Keperluan : </x-input-label>
                                    <x-text-input name="tujuan" type="text" class="form-control required-field" />
                                    <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-input-label>Isi Surat Izin : </x-input-label>
                                    <textarea name="paragraf_1" type="textarea" class="ckeditor form-control required-field"></textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('paragraf_1')" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
        const form = document.getElementById('siForm');
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