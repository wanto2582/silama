<x-app-layout>
    <x-slot name="title"> Profile </x-slot>
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Profile</h2>
        </div>
        <div class="pd-20 card-box mb-30">
            <div class="wizard-content">
                <form method="post" class="tab-wizard wizard-circle wizard clearfix" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($user->detail_users && $user->detail_users->photo != null)
                                    <img src="{{asset('storage/'.$user->detail_users->photo)}}" alt="Photo" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover; object-position: center; border-radius: 5px; outline: none;" />
                                    @endif
                                    <x-input-label>Photo :</x-input-label>
                                    <x-text-input type="file" id="photo" name="photo" accept="image/*" class="form-control" />
                                    <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    @if ($user->detail_users && $user->detail_users->ktp != null)
                                    <img src="{{asset('storage/'.$user->detail_users->ktp)}}" alt="Ktp" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover; object-position: center; border-radius: 5px; outline: none;" />
                                    @endif
                                    <x-input-label>Ktp :</x-input-label>
                                    <x-text-input type="file" id="ktp" name="ktp" accept="image/*" class="form-control" />
                                    <x-input-error class="mt-2" :messages="$errors->get('ktp')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama :</x-input-label>
                                    <x-text-input id="name" name="name" type="text" class="form-control" value="{{old('name', $user->name ?? '')}}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>NIK :</x-input-label>
                                    <x-text-input id="nik" name="nik" type="number" class="form-control" value="{{old('nik', $user->detail_users()->first()->nik ?? '')}}" required autocomplete="nik" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <x-input-label>Tempat Lahir :</x-input-label>
                                    <x-text-input id="born_place" name="born_place" type="text" class="form-control" value="{{old('born_place', $user->detail_users()->first()->born_place ?? '')}}" required autocomplete="born_place" />
                                    <x-input-error class="mt-2" :messages="$errors->get('born_place')" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <x-input-label>Tanggal Lahir :</x-input-label>
                                    <x-text-input id="born_date" type="date" name="born_date" class="form-control" value="{{old('born_date', $user->detail_users()->first()->born_date ?? '')}}" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('born_date')" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin :</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option {{ $user->detail_users && $user->detail_users->gender == 'laki-laki' ? 'selected' : '' }} value="laki-laki">Laki - Laki</option>
                                        <option {{ $user->detail_users && $user->detail_users->gender == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama :</label>
                                    <select name="religion" class="form-control">
                                        <option value="">Pilih Agama</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'protestan' ? 'selected' : '' }} value="protestan">Protestan</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'katolik' ? 'selected' : '' }} value="katolik">Katolik</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'hindu' ? 'selected' : '' }} value="hindu">Hindu</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'budha' ? 'selected' : '' }} value="budha">Budha</option>
                                        <option {{ $user->detail_users && $user->detail_users->religion == 'konghucu' ? 'selected' : '' }} value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <select name="address" class="form-control">
                                        <option>Pilih Dusun</option>
                                        <option {{$user->detail_users->address  == 'Alaraya' ? 'selected' : ''}} value="Alaraya">Alaraya</option>
                                        <option {{$user->detail_users->address  == 'Tanah Eja' ? 'selected' : ''}} value="Tanah Eja">Tanah Eja</option>
                                        <option {{$user->detail_users->address  == 'Dongi' ? 'selected' : ''}} value="Dongi">Dongi</option>
                                        <option {{$user->detail_users->address  == 'Mampua' ? 'selected' : ''}} value="Mampua">Mampua</option>
                                        <option {{$user->detail_users->address  == 'Luppung' ? 'selected' : ''}} value="Luppung">Luppung</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>RT</label>
                                    <select name="rt" class="form-control">
                                        <option>RT</option>
                                        @for ($i = 1; $i <= 30; $i++)
                                            <option {{ $user->detail_users && $user->detail_users->rt == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>RW</label>
                                    <select name="rw" class="form-control">
                                        <option>RW</option>
                                        @for ($i = 1; $i <= 15; $i++)
                                            <option {{ $user->detail_users && $user->detail_users->rw == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Pernikahan :</label>
                                    <select name="status_perkawinan" class="form-control">
                                        <option value="">Pilih Status Pernikahan</option>
                                        <option {{ $user->detail_users && $user->detail_users->status_perkawinan == 'sudah' ? 'selected' : '' }} value="sudah">Sudah Menikah</option>
                                        <option {{ $user->detail_users && $user->detail_users->status_perkawinan == 'belum' ? 'selected' : '' }} value="belum">Belum Menikah</option>
                                        <option {{ $user->detail_users && $user->detail_users->status_perkawinan == 'pernah' ? 'selected' : '' }} value="pernah">Pernah Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Pekerjaan :</x-input-label>
                                    <x-text-input id="pekerjaan" name="pekerjaan" type="pekerjaan" class="form-control" value="{{old('pekerjaan', $user->detail_users()->first()->pekerjaan ?? '')}}" required autocomplete="pekerjaan" />
                                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kewarganegaraan :</label>
                                    <select name="kewarganegaraan" class="form-control">
                                        <option value="">Pilih Kewarganegaraan</option>
                                        <option {{ $user->detail_users && $user->detail_users->kewarganegaraan == 'indonesia' ? 'selected' : '' }} value="indonesia">Indonesia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Phone Number :</x-input-label>
                                    <x-text-input id="phone_number" name="phone_number" type="number" class="form-control" value="{{old('phone_number', $user->detail_users()->first()->phone_number ?? '')}}" required autocomplete="phone_number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" name="password" type="password" class="form-control" :value="old('password')" required autocomplete="username" />
                                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                </div>
                            </div>
                        </div> --}}
                        <div class="flex items-center gap-4">
                            <x-button.primary-button class="mt-2">Save</x-button.primary-button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
