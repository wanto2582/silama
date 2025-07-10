<x-app-layout>
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="wizard-content">
                <form action="{{ route('desa.peraturan-desa.update', $detailSurat?->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama Dokumen :</x-input-label>
                                    <x-text-input id="nama" name="nama" type="text" class="form-control" value="{{old('nama', $detailSurat->nama ?? '')}}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Perihal :</x-input-label>
                                    <x-text-input id="perihal" name="perihal" type="text" class="form-control" value="{{old('perihal', $detailSurat->perihal ?? '')}}" required autofocus autocomplete="perihal" />
                                    <x-input-error class="mt-2" :messages="$errors->get('perihal')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama Kades :</x-input-label>
                                    <x-text-input id="nama_kades" name="nama_kades" type="text" class="form-control" value="{{old('nama_kades', $detailSurat->nama_kades ?? '')}}" required autofocus autocomplete="nama_kades" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nama_kades')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tahun : (Opsional)</x-input-label>
                                    <x-text-input name="tahun" type="text" class="form-control" value="{{old('tahun', $detailSurat->tahun ?? '')}}" />
                                    <!-- <x-input-error class="mt-2" :messages="$errors->get('tahun')" /> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>File : (Opsional)</x-input-label>
                                    <x-text-input name="file" type="file" class="form-control" />
                                    <!-- <x-input-error class="mt-2" :messages="$errors->get('file')" /> -->
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