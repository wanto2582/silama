<x-app-layout>
    <x-slot name="title"> {{ $metapage['title'] }} </x-slot>
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">{{ $metapage['title'] }}</h2>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="wizard-content">
                <form method="post" class="tab-wizard wizard-circle wizard clearfix" action="{{ $metapage['url'] }}" enctype="multipart/form-data">
                    @method( $metapage['method'] )
                    @csrf
                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama :</x-input-label>
                                    <x-text-input id="name" name="name" type="text" class="form-control" value="{{old('name', $user->name ?? '')}}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>NIK :</x-input-label>
                                    <x-text-input id="nik" name="nik" type="number" class="form-control" value="{{old('nik', $user->detail_users()->first()->nik ?? '')}}" required autocomplete="nik" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin :</label>
                                    <select name="gender" class="custom-select form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tempat Lahir :</x-input-label>
                                    <x-text-input id="born_place" name="born_place" type="text" class="form-control" value="{{old('born_place', $user->detail_users()->first()->born_place ?? '')}}" required autocomplete="born_place" />
                                    <x-input-error class="mt-2" :messages="$errors->get('born_place')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tanggal Lahir :</x-input-label>
                                    <x-text-input id="born_date" type="date" name="born_date" class="form-control" value="{{old('born_date', $user->detail_users()->first()->born_date ?? '')}}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('born_date')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama :</label>
                                    <select name="religion" class="custom-select form-control">
                                        <option value="">Pilih Agama</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'Protestan' ? 'selected' : '' }} value="Protestan">Protestan</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'Budha' ? 'selected' : '' }} value="Budha">Budha</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'Konghucu' ? 'selected' : '' }} value="Konghucu">Konghucu</option>
                                    </select>
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
                                    <x-input-label>Pekerjaan : </x-input-label>
                                    <x-text-input name="pekerjaan" type="text" class="form-control" />
                                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <select name="dusun" class="form-control">
                                        <option>Pilih Dusun</option>
                                        <option {{Auth::user()->detail_users->address == 'Alaraya' ? 'selected' : ''}} value="Alaraya">Alaraya</option>
                                        <option {{Auth::user()->detail_users->address == 'Tanah Eja' ? 'selected' : ''}} value="Tanah Eja">Tanah Eja</option>
                                        <option {{Auth::user()->detail_users->address == 'Dongi' ? 'selected' : ''}} value="Dongi">Dongi</option>
                                        <option {{Auth::user()->detail_users->address == 'Mampua' ? 'selected' : ''}} value="Mampua">Mampua</option>
                                        <option {{Auth::user()->detail_users->address == 'Luppung' ? 'selected' : ''}} value="Luppung">Luppung</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>RT</label>
                                    <select name="rt" class="form-control">
                                        <option>RT</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ Auth::user()->detail_users->rt == $i ? 'selected' : '' }}>{{$i}}</option>
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
                                            <option {{ Auth::user()->detail_users->rw == $i ? 'selected' : '' }}>{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-button.primary-button class="mt-2">{{ $metapage['button'] }}</x-button.primary-button>
                            @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>