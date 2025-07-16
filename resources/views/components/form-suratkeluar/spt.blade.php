<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
<form id="form-spt" method="POST" action="{{ route('desa.suratkeluar.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <x-text-input value="spt" name="jenis_surat" type="text" hidden />

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Perintah Tugas</h4>
        </div>
        <div id="form-warning" style="display:none;" class="alert alert-danger" role="alert">
            <b>Semua kolom wajib diisi, harap perhatikan lebih teliti.</b>
        </div>
        <div class="wizard-content">
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Nama Surat :</b> </x-input-label>
                            <x-text-input name="nama" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tanggal Surat dibuat :</b>&nbsp; ex <em class="text-blue">( Bulukumba, 8 Juli 2025 )</em> 
                            </x-input-label>
                            <x-text-input name="nik" type="text" class="form-control required-field" 
                            placeholder="Bulukumba, 8 Juli 2025" />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Dasar Surat :</b> 
                            <em class="text-blue"> &nbsp; ( ketik tanpa alenia paragraf dan buat baris baru jika lebih dari 1 paragraf )</em>
                            </x-input-label>
                            <textarea name="paragraf_1" type="textarea" class="ckeditor form-control required-field" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('paragraf_1')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Untuk :</b> &nbsp; <em class="text-blue"></em> </x-input-label>
                            <textarea name="perihal" type="textarea" class="ckeditor form-control required-field" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('perihal')" />
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Nama yg ditugaskan  :</b> &nbsp; * <em class="text-blue">( Yang ditugaskan )</em></x-input-label>
                            <x-text-input name="yth" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('yth')" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>NIP :</b> &nbsp; <em class="text-blue"></em></x-input-label>
                            <x-text-input name="nip" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Pangkat/Gol :</b> &nbsp; <em class="text-blue"></em></x-input-label>
                            <x-text-input name="pangkat_golongan" type="text" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('pangkat_golongan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Jabatan :</b> </x-input-label>
                            <x-text-input name="jabatan" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Lama Perjalanan :</b> &nbsp; <em class="text-blue"></em> </x-input-label>
                            <x-text-input name="lama_perjalanan" type="text" class="form-control required-field" placeholder=""/>
                            <x-input-error class="mt-2" :messages="$errors->get('lama_perjalanan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tgl Berangkat :</b> </x-input-label>
                            <x-text-input name="tgl_berangkat" type="date" class="form-control required-field" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('tgl_berangkat')" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tanggal Kembali:</b>&nbsp; ex <em class="text-blue"></em></x-input-label>
                            <x-text-input name="tgl_pulang" type="date" class="form-control required-field" placeholder="" />
                            <x-input-error class="mt-2" :messages="$errors->get('tgl_pulang')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Lokasi:</b>&nbsp; ex <em class="text-blue"></em></x-input-label>
                            <x-text-input name="tempat" type="text" class="form-control required-field" placeholder="" />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat')" />
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form-spt');
        const warning = document.getElementById('form-warning');
        form.addEventListener('submit', function(e) {
            let valid = true;
            warning.style.display = 'none';
            // Remove previous error highlight
            form.querySelectorAll('.required-field').forEach(function(input) {
                input.classList.remove('is-invalid');
                input.style.borderColor = '';
                if (input.closest('.ck-editor')) {
                    input.closest('.ck-editor').style.border = '';
                }
            });
            form.querySelectorAll('.required-field').forEach(function(input) {
                let value = input.value;
                // For CKEditor textarea, get data from CKEditor instance if available
                if (input.classList.contains('ckeditor') && window.CKEDITOR && CKEDITOR.instances[input.name]) {
                    value = CKEDITOR.instances[input.name].getData().trim();
                }
                if (!value || value.trim() === '') {
                    valid = false;
                    input.classList.add('is-invalid');
                    input.style.borderColor = '#e3342f';
                    if (input.classList.contains('ckeditor') && input.closest('.ck-editor')) {
                        input.closest('.ck-editor').style.border = '2px solid #e3342f';
                    }
                }
            });
            if (!valid) {
                warning.style.display = 'block';
                e.preventDefault();
            }
        });
    });
    </script>
</div>