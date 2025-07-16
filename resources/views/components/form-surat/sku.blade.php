<div {{$attributes}} style="display: none;" class="pd-20 card-box mb-30">
    <form id="skuForm" method="POST" action="{{ route('desa.surat.store') }}" enctype="multipart/form-data">
        @csrf
        <x-text-input value="sku" name="jenis_surat" type="text" hidden />

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Usaha</h4>
        </div>

        <div class="wizard-content">
            <div id="formAlert" style="display:none;" class="alert alert-danger text-center mb-3" role="alert">
                <strong>Semua kolom wajib diisi, harap perhatikan lebih teliti!</strong>
            </div>
            <h6>Data pemilik usaha :</h6>
            <section>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama : </x-input-label>
                            <x-text-input name="nama" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>NIK : </x-input-label>
                            <x-text-input name="nik" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>NIK : </x-input-label>
                            <select class="custom-select2 form-control" name="nik" id="nik-select">
                                <option value="">Pilih NIK</option>
                                @foreach($warga as $value)
                                @if($value && $value->nik)
                                <option value="{{ $value->nik }}">{{ $value->nik }} - {{ $value->nama }}</option>
                                @endif
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div> -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin :</label>
                            <select name="gender" class="form-control">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat Lahir : </x-input-label>
                            <x-text-input name="tempat_lahir" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tanggal Lahir : </x-input-label>
                            <x-text-input name="tanggal_lahir" type="date" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Agama : </x-input-label>
                            <select name="agama" class="form-control">
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
                            <x-text-input name="kewarganegaraan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('kewarganegaraan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Pernikahan :</label>
                            <select name="status_pernikahan" class="form-control">
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
                            <x-text-input name="pekerjaan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dusun</label>
                            <select name="dusun" class="form-control">
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
                            <select name="rt" class="form-control">
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
                            <select name="rw" class="form-control">
                                <option>RW</option>
                                @for ($i = 1; $i <= 15; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Berkas Persyaratan (.zip / .rar) : [[ <a data-toggle="modal" data-target="#passwordModal4" href="#">Lihat Syarat</a> ]]</x-input-label>
                            <x-text-input name="berkas" type="file" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('berkas')" />
                        </div>
                    </div>

                </div>
            </section>

            <h6>Keterangan usaha :</h6>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama Usaha : </x-input-label>
                            <x-text-input name="nama_instansi" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_instansi')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Mulai Usaha : </x-input-label>
                            <x-text-input name="mulai_usaha" type="date" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('mulai_usaha')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat Usaha : </x-input-label>
                            <x-text-input name="alamat_usaha" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('alamat_usaha')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tujuan : </x-input-label>
                            <x-text-input name="tujuan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-button.primary-button id="submitBtn">Submit</x-button.primary-button>
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
                            - Tanda Lunas PBB
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
        const form = document.getElementById('skuForm');
        const alertBox = document.getElementById('formAlert');
        const requiredSelectors = [
            'input[name="nama"]',
            'input[name="nik"]',
            'select[name="gender"]',
            'input[name="tempat_lahir"]',
            'input[name="tanggal_lahir"]',
            'select[name="agama"]',
            'input[name="kewarganegaraan"]',
            'select[name="status_pernikahan"]',
            'input[name="pekerjaan"]',
            'select[name="dusun"]',
            'select[name="rt"]',
            'select[name="rw"]',
            'input[name="berkas"]',
            'input[name="nama_instansi"]',
            'input[name="mulai_usaha"]',
            'input[name="alamat_usaha"]',
            'input[name="tujuan"]'
        ];
        form.addEventListener('submit', function(e) {
            let valid = true;
            requiredSelectors.forEach(function(selector) {
                const el = form.querySelector(selector);
                if (el) {
                    if ((el.tagName === 'SELECT' && (!el.value || el.value.toLowerCase().includes('pilih'))) || (el.tagName !== 'SELECT' && !el.value)) {
                        valid = false;
                        el.classList.add('is-invalid');
                    } else {
                        el.classList.remove('is-invalid');
                    }
                }
            });
            if (!valid) {
                e.preventDefault();
                alertBox.style.display = 'block';
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