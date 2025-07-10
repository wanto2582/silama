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
                                    <x-input-label>Nama Dokumen/perihal:</x-input-label>
                                    <x-text-input id="nama" name="nama" type="text" class="form-control" value="{{old('nama', $peraturanDesa->nama ?? '')}}" required autofocus autocomplete="nama" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Periode jabatan kades :</x-input-label>
                                    <x-text-input id="perihal" name="perihal" type="text" class="form-control" value="{{old('perihal', $peraturanDesa->perihal ?? '')}}" required autofocus autocomplete="perihal" />
                                    <x-input-error class="mt-2" :messages="$errors->get('perihal')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Nama Kades :</x-input-label>
                                    <x-text-input id="nama_kades" name="nama_kades" type="text" class="form-control" value="{{old('nama_kades', $peraturanDesa->nama_kades ?? '')}}" required autofocus autocomplete="nama_kades" />
                                    <x-input-error class="mt-2" :messages="$errors->get('nama_kades')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>Tahun (Pengesahan)  :</x-input-label>
                                    <x-text-input name="tahun" type="text" class="form-control" value="{{old('tahun', $peraturanDesa->tahun ?? '')}}" />
                                    <!-- <x-input-error class="mt-2" :messages="$errors->get('tahun')" /> -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-input-label>File PDF Surat :</x-input-label>
                                    <x-text-input name="file" type="file" class="form-control" accept=".pdf" />
                                    <small class="form-text text-muted">Upload file PDF (maksimal 50MB)</small>
                                    @if(isset($peraturanDesa) && $peraturanDesa->file_pdf)
                                    <div class="mt-2">
                                        <small class="text-info">
                                            <i class="fa fa-file-pdf-o"></i>
                                            File saat ini: <a href="{{ asset('storage/' . $peraturanDesa->file) }}" target="_blank">{{ basename($peraturanDesa->file) }}</a>
                                        </small>
                                    </div>
                                    @endif
                                    <x-input-error class="mt-2" :messages="$errors->get('file_pdf')" />
                                </div>
                            </div>

                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <x-input-label>Keterangan :</x-input-label>
                                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)">{{old('keterangan', $peraturanDesa->keterangan ?? '')}}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                                </div>
                            </div> -->
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

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Validasi file PDF
            $('input[name="file_pdf"]').on('change', function() {
                const file = this.files[0];
                const maxSize = 5 * 1024 * 1024; // 5MB dalam bytes

                if (file) {
                    // Validasi tipe file
                    if (file.type !== 'application/pdf') {
                        alert('File harus berformat PDF!');
                        $(this).val('');
                        return;
                    }

                    // Validasi ukuran file
                    if (file.size > maxSize) {
                        alert('Ukuran file tidak boleh lebih dari 5MB!');
                        $(this).val('');
                        return;
                    }

                    // Tampilkan nama file yang dipilih
                    const fileName = file.name;
                    const fileSize = (file.size / 1024 / 1024).toFixed(2);
                    $(this).next('.form-text').html(`File terpilih: <strong>${fileName}</strong> (${fileSize} MB)`);
                }
            });

            // Set tanggal surat default ke hari ini
            if (!$('input[name="tanggal_surat"]').val()) {
                const today = new Date().toISOString().split('T')[0];
                $('input[name="tanggal_surat"]').val(today);
            }

            // Validasi form sebelum submit
            $('form').on('submit', function(e) {
                const requiredFields = ['name', 'tahun', 'perihal', 'nama_kades', 'tanggal_surat', 'nama_kades', 'perihal'];
                let isValid = true;

                requiredFields.forEach(function(field) {
                    const value = $(`[name="${field}"]`).val();
                    if (!value || value.trim() === '') {
                        isValid = false;
                        $(`[name="${field}"]`).addClass('is-invalid');
                    } else {
                        $(`[name="${field}"]`).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Harap lengkapi semua field yang wajib diisi!');
                }
            });
        });
    </script>
    @endpush
</x-app-layout>