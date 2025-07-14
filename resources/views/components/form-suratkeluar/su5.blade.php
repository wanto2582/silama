<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
    <form method="POST" action="{{ route('desa.suratkeluar.store') }}" enctype="multipart/form-data">
        @csrf
        <x-text-input value="su5" name="jenis_surat" type="text" hidden />

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Undangan 1-5</h4>
        </div>
        <div class="wizard-content">
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-input-label><b>Nama Surat :</b> </x-input-label>
                            <x-text-input name="nama" type="text" class="form-control" placeholder=" ex. Undangan Rapat" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tanggal Surat :</b>&nbsp; ex <em class="text-blue">( Bulukumba, 8 Juli 2025 )</em> </x-input-label>
                            <x-text-input name="nik" type="text" class="form-control" 
                            placeholder="Bulukumba, 8 Juli 2025" />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Sifat :</b> </x-input-label>
                            <x-text-input name="sifat" type="text" class="form-control" placeholder=" ex. Biasa" />
                            <x-input-error class="mt-2" :messages="$errors->get('sifat')" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Lampiran :</b>&nbsp; ex <em class="text-blue">( 1 (satu) Lembar )</em></x-input-label>
                            <x-text-input name="lampiran" type="text" class="form-control" placeholder="1 (satu) Lembar" />
                            <x-input-error class="mt-2" :messages="$errors->get('lampiran')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Hal :</b> &nbsp; <em class="text-blue">( isikan tanda _ jika kosong )</em> </x-input-label>
                            <x-text-input name="perihal" type="text" class="form-control" placeholder="_"/>
                            <x-input-error class="mt-2" :messages="$errors->get('perihal')" />
                        </div>
                    </div>

                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Yth :</b> </x-input-label>
                            <textarea name="yth" type="text" class=" ckeditor form-control" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('yth')" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Hari / Tanggal :</b> &nbsp; ex <em class="text-blue">( Selasa / 8 Juli 2025 )</em></x-input-label>
                            <x-text-input name="hari" type="text" class="form-control" placeholder=" Selasa / 8 Juli 2025" />
                            <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Waktu :</b> &nbsp; ex <em class="text-blue">( 13:00 )</em></x-input-label>
                            <x-text-input name="waktu" type="text" class="form-control" placeholder=" 13:00" />
                            <x-input-error class="mt-2" :messages="$errors->get('waktu')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tempat :</b> </x-input-label>
                            <x-text-input name="tempat" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat')" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Isi Surat :</b> 
                            <em class="text-blue"> &nbsp; ( ketik tanpa alenia paragraf dan buat baris baru jika lebih dari 1 paragraf )</em>
                            </x-input-label>
                            <textarea name="paragraf_1" type="textarea" class="ckeditor form-control" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('paragraf_1')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Penekanan :</b> 
                            <em class="text-blue"> &nbsp; ( Kosongkan jika tidak diperlukan )</em>
                            </x-input-label>
                            <textarea name="paragraf_2" type="textarea" class="ckeditor form-control" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('paragraf_2')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label><b>Tembusan :</b> <em class="text-blue">( kosongkan jika tidak ada )</em> </x-input-label>
                            <textarea name="tembusan" type="textarea" class="ckeditor form-control"></textarea>

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
</div>