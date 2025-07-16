<div {{$attributes}} style="display: none;" class="pd-20 card-box mb-30">
    <!-- Alert untuk validasi -->
    <div id="formAlert" class="alert alert-danger d-none" role="alert" style="font-weight:bold;">
        Semua kolom wajib diisi, harap perhatikan lebih teliti.
    </div>
    <form id="sklForm" method="POST" action="{{ route('desa.surat.store') }}" enctype="multipart/form-data">
        @csrf
        <x-text-input value="skl" name="jenis_surat" type="text" hidden />

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Kelahiran</h4>
        </div>

        <div class="wizard-content">
            <h6>Data Kelahiran Anak :  &nbsp; <em class="text-danger">( Pastikan semua form terisi dengan benar sesui dengan petunjuk )</em></h6> 
            <br>
            <section>
                <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nik anak : </b> &nbsp; <em class="text-blue">( ketikan angka 000)</em> </x-input-label>
                            <x-text-input name="nik" type="text" class="form-control" placeholder="000 " />
                            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama anak : </x-input-label>
                            <x-text-input name="nama" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Anak ke : </b> &nbsp; <em class="text-blue">( Ketikan dalam teks )</em> </x-input-label>
                            <x-text-input name="anak_ke" type="text" class="form-control" placeholder=" Pertama" />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_ke')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Anak ke :  &nbsp; <em class="text-blue">( Ketikan dalam angka )</em> </x-input-label>
                            <x-text-input name="anak_ke_angka" type="text" class="form-control" placeholder="1 " />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_ke_angka')" />
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jennis kelamin :</label>
                            <select name="anak_gender" class="form-control">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tgl dilahirkan :  </x-input-label>
                            <x-text-input name="anak_tanggal_lahir" type="date" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_tanggal_lahir')" />
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat dilahirkan :  &nbsp; <em class="text-blue"> ( nama kabupaten ), </em> </x-input-label>
                            <x-text-input name="anak_tempat_lahir" type="text" class="form-control" placeholder=" Kabupaten Bulukumba" />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_tempat_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat anak :  &nbsp; <em class="text-blue">(Dusun, Rt . Rw, Desa )</em></x-input-label>
                            <x-text-input name="anak_alamat" type="text" class="form-control" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('anak_alamat')" />
                        </div>
                    </div>

            

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Penolong kelahiran :  &nbsp; <em class="text-blue">( Bidan/Dokter/Dukun bayi )</em> </x-input-label>
                            <x-text-input name="penolong" type="text" class="form-control" placeholder="Bidan " /> 
                            <x-input-error class="mt-2" :messages="$errors->get('penolong')" />
                        </div>
                    </div>

                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat penolong : </x-input-label>
                            <x-text-input name="penolong_alamat" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('penolong_alamat')" />
                        </div>
                    </div>

                   
                </div>
            </section>
            <br></br><hr></hr>
            <h6>Data orangtua :</h6>
            <br>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama ibu : </x-input-label>
                            <x-text-input name="ibu_nama" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_nama')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nama ayah : </x-input-label>
                            <x-text-input name="ayah_nama" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_nama')" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nik ibu : </x-input-label>
                            <x-text-input name="ibu_nik" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_nik')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Nik ayah : </x-input-label>
                            <x-text-input name="ayah_nik" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_nik')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat lahir ibu : </x-input-label>
                            <x-text-input name="ibu_tempat_lahir" type="text" class="form-control" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_tempat_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tempat lahir ayah : </x-input-label>
                            <x-text-input name="ayah_tempat_lahir" type="text" class="form-control" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_tempat_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tanggal lahir ibu : </x-input-label>
                            <x-text-input name="ibu_tanggal_lahir" type="date" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_tanggal_lahir')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tanggal lahir ayah : </x-input-label>
                            <x-text-input name="ayah_tanggal_lahir" type="date" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_tanggal_lahir')" />
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat ibu : </x-input-label>
                            <x-text-input name="ibu_alamat" type="text" class="form-control" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ibu_alamat')" />
                        </div>
                    </div>
                      
                     
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Alamat ayah : </x-input-label>
                            <x-text-input name="ayah_alamat" type="text" class="form-control" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('ayah_alamat')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Tujuan pembuatan surat : </x-input-label>
                            <x-text-input name="tujuan" type="text" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label>Berkas Persyaratan (.zip / .rar /. PDF) : [[ <a data-toggle="modal" data-target="#passwordModal4" href="#">Lihat Syarat</a> ]]</x-input-label>
                            <x-text-input name="berkas" type="file" class="form-control" />
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
                    
                            - Kartu Keluarga
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('sklForm');
        const alertBox = document.getElementById('formAlert');
        form.addEventListener('submit', function(e) {
            let valid = true;
            // Ambil semua input dan select yang visible
            const inputs = form.querySelectorAll('input:not([type=hidden]):not([type=submit]), select');
            inputs.forEach(function(input) {
                if (input.offsetParent !== null && !input.value.trim()) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (!valid) {
                e.preventDefault();
                alertBox.classList.remove('d-none');
                alertBox.classList.add('show');
                alertBox.style.animation = 'shake 0.3s';
                setTimeout(() => { alertBox.style.animation = ''; }, 400);
            } else {
                alertBox.classList.add('d-none');
                alertBox.classList.remove('show');
            }
        });
    });
    // Animasi shake
    const style = document.createElement('style');
    style.innerHTML = `@keyframes shake { 0% { transform: translateX(0); } 25% { transform: translateX(-8px); } 50% { transform: translateX(8px); } 75% { transform: translateX(-8px); } 100% { transform: translateX(0); } }`;
    document.head.appendChild(style);
    </script>
</div>