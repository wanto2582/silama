<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
    {{-- Container utama untuk membagi dua bagian --}}
    <div class="split-container">
        {{-- Bagian Kiri: Form --}}
        <div class="split-left">
            <form id="sklForm" method="POST" action="{{ route('desa.surat.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <x-text-input value="skl" name="jenis_surat" type="text" hidden />

                <div class="clearfix">
                    <h4 class="text-blue h4">SURAT KETERANGAN KELAHIRAN</h4>
                </div>
                <div class="wizard-content">
                    <div id="formAlert" style="display:none;" class="alert alert-danger mb-3" role="alert">
                        <strong>Semua kolom wajib diisi, harap perhatikan lebih teliti.</strong>
                    </div>
                    <section>
                <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nik anak : </b> &nbsp; <em class="text-blue">( ketikan angka 000)</em> </x-input-label>
                            <x-text-input name="nik" type="text" class="form-control required-field" placeholder="000 " />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama anak : </x-input-label>
                            <x-text-input name="nama" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Anak ke : </b> &nbsp; <em class="text-blue">( Ketikan dalam teks )</em> </x-input-label>
                            <x-text-input name="anak_ke" type="text" class="form-control required-field" placeholder=" Pertama" />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_ke')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Anak ke :  &nbsp; <em class="text-blue">( Ketikan dalam angka )</em> </x-input-label>
                            <x-text-input name="anak_ke_angka" type="text" class="form-control required-field" placeholder="1 " />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_ke_angka')" />
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jennis kelamin :</label>
                            <select name="anak_gender" class="form-control required-field">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tgl dilahirkan :  </x-input-label>
                            <x-text-input name="anak_tanggal_lahir" type="date" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_tanggal_lahir')" />
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat dilahirkan :  &nbsp; <em class="text-blue"> ( nama kabupaten ), </em> </x-input-label>
                            <x-text-input name="anak_tempat_lahir" type="text" class="form-control required-field" placeholder=" Kabupaten Bulukumba" />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_tempat_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat anak :  &nbsp; <em class="text-blue">(Dusun, Rt . Rw, Desa )</em></x-input-label>
                            <x-text-input name="anak_alamat" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_alamat')" />
                        </div>
                    </div>

            

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Penolong kelahiran :  &nbsp; <em class="text-blue">( Bidan/Dokter/Dukun bayi )</em> </x-input-label>
                            <x-text-input name="penolong" type="text" class="form-control required-field" placeholder="Bidan " /> 
                            <x-input-error class="mt-2" :messages="$errors->get('penolong')" />
                        </div>
                    </div>

                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat penolong : </x-input-label>
                            <x-text-input name="penolong_alamat" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('penolong_alamat')" />
                        </div>
                    </div>

                   
                </div>
            </section>
            <br></br><hr></hr>
            <h6>Data orangtua :</h6>
            <br>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama ibu : </x-input-label>
                            <x-text-input name="ibu_nama" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_nama')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama ayah : </x-input-label>
                            <x-text-input name="ayah_nama" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nik ibu : </x-input-label>
                            <x-text-input name="ibu_nik" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_nik')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nik ayah : </x-input-label>
                            <x-text-input name="ayah_nik" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_nik')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat lahir ibu : </x-input-label>
                            <x-text-input name="ibu_tempat_lahir" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_tempat_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat lahir ayah : </x-input-label>
                            <x-text-input name="ayah_tempat_lahir" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_tempat_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tanggal lahir ibu : </x-input-label>
                            <x-text-input name="ibu_tanggal_lahir" type="date" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_tanggal_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tanggal lahir ayah : </x-input-label>
                            <x-text-input name="ayah_tanggal_lahir" type="date" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_tanggal_lahir')" />
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat ibu : </x-input-label>
                            <x-text-input name="ibu_alamat" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_alamat')" />
                        </div>
                    </div>
                      
                     
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat ayah : </x-input-label>
                            <x-text-input name="ayah_alamat" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_alamat')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tujuan pembuatan surat : </x-input-label>
                            <x-text-input name="tujuan" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Berkas Persyaratan (.zip / .rar /. PDF) : [[ <a data-toggle="modal" data-target="#passwordModal4" href="#">Lihat Syarat</a> ]]</x-input-label>
                            <x-text-input name="berkas" type="file" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('berkas')" />
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-button.primary-button>Submit</x-button.primary-button>
                    </div>
                </div>
            </section>

            <div class="modal fade" id="passwordModal4" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
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
        const form = document.getElementById('sklForm');
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