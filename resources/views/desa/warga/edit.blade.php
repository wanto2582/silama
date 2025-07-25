<x-app-layout>
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="wizard-content">
                <form action="{{ route('desa.warga.update', $detailWarga?->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama :</x-input-label>
                                    <x-text-input id="nama" name="nama" type="text" class="form-control" value="{{old('nama', $detailWarga->nama ?? '')}}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>NIK :</x-input-label>
                                    <x-text-input id="nik" name="nik" type="number" class="form-control" value="{{old('nik', $detailWarga->nik ?? '')}}" required autocomplete="nik" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>No. KK :</x-input-label>
                                    <x-text-input id="kk" name="kk" type="number" class="form-control" value="{{old('kk', $detailWarga->kk ?? '')}}" required autocomplete="kk" />
                                    <x-input-error class="mt-2" :messages="$errors->get('kk')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin :</label>
                                    <select name="jenis_kelamin" class="custom-select form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option {{ $detailWarga->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }} value="Laki-Laki">Laki-Laki</option>
                                        <option {{ $detailWarga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tempat Lahir :</x-input-label>
                                    <x-text-input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control" value="{{old('tempat_lahir', $detailWarga->tempat_lahir ?? '')}}" required autocomplete="born_place" />
                                    <x-input-error class="mt-2" :messages="$errors->get('born_place')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tanggal Lahir :</x-input-label>
                                    <x-text-input id="tgl_lahir" type="date" name="tgl_lahir" class="form-control" value="{{old('tgl_lahir', $detailWarga->tgl_lahir ?? '')}}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('born_date')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama :</label>
                                    <select name="agama" class="custom-select form-control">
                                        <option>Pilih Agama</option>
                                        <option {{ $detailWarga->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                        <option {{ $detailWarga->agama == 'Protestan' ? 'selected' : '' }} value="Protestan">Protestan</option>
                                        <option {{ $detailWarga->agama == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                                        <option {{ $detailWarga->agama == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                                        <option {{ $detailWarga->agama == 'Budha' ? 'selected' : '' }} value="Budha">Budha</option>
                                        <option {{ $detailWarga->agama == 'Konghucu' ? 'selected' : '' }} value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Kewarganegaraan : </x-input-label>
                                    <x-text-input name="kewarganegaraan" type="text" class="form-control" value="{{old('kewarganegaraan', $detailWarga->kewarganegaraan ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('kewarganegaraan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Pekerjaan : </x-input-label>
                                    <x-text-input name="pekerjaan" type="text" class="form-control" value="{{old('pekerjaan', $detailWarga->pekerjaan ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Pendidikan terahir : </x-input-label>
                                    <x-text-input name="pendidikan" type="text" class="form-control" value="{{old('pendidikan', $detailWarga->pendidikan ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('pendidikan')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Dapat Membaca Huruf : </x-input-label>
                                    <x-text-input name="dapat_membaca_huruf" type="text" class="form-control" value="{{old('dapat_membaca_huruf', $detailWarga->dapat_membaca_huruf ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('dapat_membaca_huruf')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>No. Telp : </x-input-label>
                                    <x-text-input name="no_tlp" type="text" class="form-control" value="{{old('no_tlp', $detailWarga->no_tlp ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('no_tlp')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>No. Rumah : </x-input-label>
                                    <x-text-input name="no_rumah" type="text" class="form-control" value="{{old('no_rumah', $detailWarga->no_rumah ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('no_rumah')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Alamat : </x-input-label>
                                    <x-text-input name="alamat" type="text" class="form-control" value="{{old('alamat', $detailWarga->alamat ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Pernikahan :</label>
                                    <select name="status_pernikahan" class="form-control">
                                        <option>Pilih Status Pernikahan</option>
                                        <option {{ $detailWarga->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }} value="Belum Menikah">Belum Menikah</option>
                                        <option {{ $detailWarga->status_pernikahan == 'Menikah' ? 'selected' : '' }} value="Menikah">Menikah</option>
                                        <option {{ $detailWarga->status_pernikahan == 'Pernah Menikah' ? 'selected' : '' }} value="Pernah Menikah">Pernah Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>kedudukan dalam keluarga : </x-input-label>
                                    <x-text-input name="kedudukan_dlm_keluarga" type="text" class="form-control" value="{{old('kedudukan_dlm_keluarga', $detailWarga->kedudukan_dlm_keluarga ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('kedudukan_dlm_keluarga')" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <select name="dusun" class="form-control">
                                        <option>Pilih Dusun</option>
                                        <option {{ $detailWarga->dusun == 'Alaraya' ? 'selected' : '' }} value="Alaraya">Alaraya</option>
                                        <option {{ $detailWarga->dusun == 'Tanah Eja' ? 'selected' : '' }} value="Tanah Eja">Tanah Eja</option>
                                        <option {{ $detailWarga->dusun == 'Dongi' ? 'selected' : '' }} value="Dongi">Dongi</option>
                                        <option {{ $detailWarga->dusun == 'Mampua' ? 'selected' : '' }} value="Mampua">Mampua</option>
                                        <option {{ $detailWarga->dusun == 'Luppung' ? 'selected' : '' }} value="Luppung">Luppung</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>RT</label>
                                    <select name="rt" class="form-control">
                                        <option>RT</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ $detailWarga->rt == $i ? 'selected' : '' }}>{{$i}}</option>
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
                                            <option {{ $detailWarga->rw == $i ? 'selected' : '' }}>{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Keterangan : </x-input-label>
                                    <x-text-input name="keterangan" type="text" class="form-control" value="{{old('keterangan', $detailWarga->keterangan ?? '')}}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <x-button.primary-button>Submit</x-button.primary-button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>