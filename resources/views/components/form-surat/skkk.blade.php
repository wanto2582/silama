<div {{$attributes}} style="display: none;" class="pd-20 card-box mb-30">
    <form id="skkkForm" method="POST" action="{{ route('desa.surat.store') }}" enctype="multipart/form-data">
        @csrf
        <x-text-input value="skkk" name="jenis_surat" type="text" hidden />

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Kepemilikan Kendaraan</h4>
        </div>

        <div class="wizard-content">
            <div id="formAlert" style="display:none;" class="alert alert-danger d-flex align-items-center mb-3" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill mr-2" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.964 0L.165 13.233c-.457.778.091 1.767.982 1.767h13.707c.89 0 1.438-.99.982-1.767L8.982 1.566zm-.982.934c.246-.41.84-.41 1.086 0l6.853 11.667c.246.418-.06.833-.543.833H1.604c-.483 0-.789-.415-.543-.833L8 2.5z"/>
                  <path d="M7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm.93-7.481a.5.5 0 0 1 .938 0l.007.058.345 4.5a.5.5 0 0 1-.495.523h-.007a.5.5 0 0 1-.495-.523l.345-4.5.007-.058z"/>
                </svg>
                <span>Semua kolom wajib diisi, harap perhatikan lebih teliti.</span>
            </div>
            <h6>Data pemilik kendaraan :</h6>
            <section>
                <div class="row">

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
                            <x-input-label>Pekerjaan : </x-input-label>
                            <x-text-input name="pekerjaan" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                        </div>
                    </div>

                    <div class="col-md-4">
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

                    <div class="col-md-1">
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

                    <div class="col-md-1">
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
                            <x-input-label>Berkas Persyaratan (.zip / .rar) : [[ <a data-toggle="modal" data-target="#passwordModal5" href="#">Lihat Syarat</a> ]]</x-input-label>
                            <x-text-input name="berkas" type="file" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('berkas')" />
                        </div>
                    </div>

                </div>
            </section>

            <h6>Keterangan Kendaraan :</h6>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Merk / Type : </x-input-label>
                            <x-text-input name="merk_type" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('merk_type')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tahun Pembuatan : </x-input-label>
                            <x-text-input name="tahun_pembuatan" type="date" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_pembuatan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Warna : </x-input-label>
                            <x-text-input name="warna" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('warna')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nomor Rangka : </x-input-label>
                            <x-text-input name="nomor_rangka" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('nomor_rangka')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nomor Mesin : </x-input-label>
                            <x-text-input name="nomor_mesin" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('nomor_mesin')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nomor Polisi : </x-input-label>
                            <x-text-input name="nomor_polisi" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('nomor_polisi')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nomor BPKB : </x-input-label>
                            <x-text-input name="nomor_bpkb" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('nomor_bpkb')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Atas Nama : </x-input-label>
                            <x-text-input name="atas_nama" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('atas_nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tujuan : </x-input-label>
                            <x-text-input name="tujuan" type="text" class="form-control required-field" />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-button.primary-button>Submit</x-button.primary-button>
                    </div>
                </div>
            </section>

            <div class="modal fade" id="passwordModal5" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
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
                            - BPKB
                            <br>
                            - STNK
                            <br>
                            - Kartu Keluarga
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('skkkForm');
        const alertBox = document.getElementById('formAlert');
        form.addEventListener('submit', function(e) {
            let valid = true;
            form.querySelectorAll('.required-field').forEach(function(input) {
                if ((input.type === 'file' && !input.value) || (input.tagName === 'SELECT' && (!input.value || input.selectedIndex === 0)) || (input.type !== 'file' && input.type !== 'hidden' && !input.value.trim())) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (!valid) {
                e.preventDefault();
                alertBox.style.display = 'flex';
                alertBox.classList.add('animate__animated', 'animate__shakeX');
                setTimeout(() => {
                    alertBox.classList.remove('animate__shakeX');
                }, 1000);
            } else {
                alertBox.style.display = 'none';
            }
        });
    });
    </script>
</div>