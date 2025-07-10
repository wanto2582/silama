<x-app-layout>
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="wizard-content">
                <form action="{{ route('desa.surat-masuk.update', $detailSurat?->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama/perihal :</x-input-label>
                                    <x-text-input id="nama" name="nama" type="text" class="form-control" value="{{old('nama', $detailSurat->nama ?? '')}}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Jenis Surat :</x-input-label>
                                    <x-text-input id="jenis_surat" name="jenis_surat" type="text" class="form-control" value="{{old('jenis_surat', $detailSurat->jenis_surat ?? '')}}" required autofocus autocomplete="jenis_surat" />
                                    <x-input-error class="mt-2" :messages="$errors->get('jenis_surat')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Asal Surat :</x-input-label>
                                    <x-text-input id="surat_dari" name="surat_dari" type="text" class="form-control" value="{{old('surat_dari', $detailSurat->surat_dari ?? '')}}" required autofocus autocomplete="surat_dari" />
                                    <x-input-error class="mt-2" :messages="$errors->get('surat_dari')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>No Surat : (Opsional)</x-input-label>
                                    <x-text-input name="no_surat" type="text" class="form-control" value="{{old('no_surat', $detailSurat->no_surat ?? '')}}" />
                                    <!-- <x-input-error class="mt-2" :messages="$errors->get('no_surat')" /> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>File Surat : (Opsional)</x-input-label>
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