<div style="display: block;" class="pd-20 card-box mb-30">
    <form action="{{ route('desa.surat.update', $detailSurat?->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <x-text-input value="sktm" name="jenis_surat" type="text" hidden />

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Tidak Mampu</h4>
        </div>
        <div class="wizard-content">
            <h5>Personal Info</h5>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama : </x-input-label>
                            <x-text-input value="{{ old('nama', $detailSurat?->nama) }}" name="nama" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>NIK : </x-input-label>
                            <x-text-input value="{{ old('nik', $detailSurat?->nik) }}" name="nik" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin :</label>
                            <select name="gender" class="form-control">
                                <option>Pilih Jenis Kelamin</option>
                                <option {{$detailSurat?->gender == 'Laki - Laki' ? 'selected' : '' }} value="Laki - Laki">Laki - laki</option>
                                <option {{$detailSurat?->gender == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat Lahir : </x-input-label>
                            <x-text-input value="{{ old('tempat_lahir', $detailSurat?->tempat_lahir) }}" name="tempat_lahir" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tanggal Lahir : </x-input-label>
                            <x-text-input value="{{ old('tanggal_lahir', $detailSurat?->tanggal_lahir) }}" name="tanggal_lahir" type="date" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Agama : </x-input-label>
                            <select name="agama" class="form-control">
                                <option>Pilih Jenis Kelamin</option>
                                <option {{$detailSurat?->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                <option {{$detailSurat?->agama == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                                <option {{$detailSurat?->agama == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                                <option {{$detailSurat?->agama == 'Budha' ? 'selected' : '' }} value="Budha">Budha</option>
                                <option {{$detailSurat?->agama == 'Konghucu' ? 'selected' : '' }} value="Konghucu">Konghucu</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Kewarganegaraan : </x-input-label>
                            <x-text-input value="{{ old('kewarganegaraan', $detailSurat?->kewarganegaraan) }}" name="kewarganegaraan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('kewarganegaraan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Pekerjaan : </x-input-label>
                            <x-text-input value="{{ old('pekerjaan', $detailSurat?->pekerjaan) }}" name="pekerjaan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Pernikahan :</label>
                            <select name="status_pernikahan" class="form-control">
                                <option>Pilih Status Pernikahan</option>
                                <option {{$detailSurat?->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }} value="Belum Menikah">Belum Menikah</option>
                                <option {{$detailSurat?->status_pernikahan == 'Menikah' ? 'selected' : '' }} value="Menikah">Menikah</option>
                                <option {{$detailSurat?->status_pernikahan == 'Pernah Menikah' ? 'selected' : '' }} value="Pernah Menikah">Pernah Menikah</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat :</label>
                            <textarea name="alamat" class="form-control">{{$detailSurat?->alamat}}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Keperluan : </x-input-label>
                            <x-text-input value="{{ old('tujuan', $detailSurat?->tujuan) }}" name="tujuan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Berkas Persyaratan (.zip / .rar) : </x-input-label>
                            @if ($detailSurat?->berkas)
                            <td><a href="{{ route('desa.surat.berkas', $detailSurat?->id) }}" class="text-primary">Unduh Berkas</a></td>
                            @endif
                            <x-text-input value="{{ old('berkas') }}" name="berkas" type="file" class="form-control" />
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

        </div>
    </form>
</div>
