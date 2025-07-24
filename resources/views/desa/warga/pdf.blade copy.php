<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT KETERANGAN DOMISILI</title>
    
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="src/images/logo.png" alt="logo" class="logo" style="padding: 0px 0px 0px 20px ">
        </div>
        <div class="kop">
            <h4 style="font-size:13">PEMERINTAH KABUPATEN BULUKUMBA</h4>
            <h4 style="font-size:13">KECAMATAN UJUNG LOE</h4>
            <h2 style="font-size:16">DESA MANYAMPA</h2>
            <p class="hp">Jln. Gallarang Kentang No. 5A Dusun Dongi, Manyampa, Ujung Loe, Bulukumba 92562</p>
        </div>
    </div>
    <hr class="line" />
    <div class="container">
        <h3 class="judul">DATA INDIVIDU WARGA</h3>

        <!-- Tiga kolom: Foto (kiri), Detail (tengah), QR Code (kanan) -->
        
        <div class="warga-row">
            <!-- Kolom Foto -->
            <div class="warga-col foto">
            @if(!empty($dataWarga->foto))
                <img src="{{ asset('storage/foto_warga/' . $dataWarga->foto) }}" alt="Foto Warga" class="foto-img">
            @else
                <div class="foto-placeholder">Tidak Ada Foto</div>
            @endif
            <div class="warga-col-title">Foto Warga</div>
            </div>
            <!-- Kolom Detail -->
            <div class="warga-col detail">
            <div class="warga-detail-row">
                <span class="warga-label">Nama:</span>
                <span class="warga-value">{{ old('nama', $dataWarga->nama ?? '-') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">NIK:</span>
                <span class="warga-value">{{ old('nik', $dataWarga->nik ?? '-') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">No. KK:</span>
                <span class="warga-value">{{ old('no_kk', $dataWarga->no_kk ?? '-') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">TTL:</span>
                <span class="warga-value">{{ old('tempat_lahir', $dataWarga->tempat_lahir ?? '-') }}, {{ old('tgl_lahir', $dataWarga->tgl_lahir ?? '-') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">Alamat:</span>
                <span class="warga-value">{{ old('alamat', $dataWarga->alamat ?? '-') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">Dusun:</span>
                <span class="warga-value">{{ old('dusun', $dataWarga->dusun ?? '-') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">Desa:</span>
                <span class="warga-value">{{ old('desa', $dataWarga->desa ?? 'Manyampa') }}</span>
            </div>
            <div class="warga-detail-row">
                <span class="warga-label">No. HP:</span>
                <span class="warga-value">{{ old('no_hp', $dataWarga->no_hp ?? '-') }}</span>
            </div>
            </div>
            <!-- Kolom QR Code -->
            <div class="warga-col qr">
            @if(!empty($dataWarga->qr_code))
                <img src="data:image/png;base64,{{ $dataWarga->qr_code }}" alt="QR Code" class="qr-img">
            @else
                <div class="qr-placeholder">QR Tidak Ada</div>
            @endif
            <div class="warga-col-title">QR Code</div>
            </div>
        </div>

       
        <section>
            <div class="section-title">I. Data Identitas Diri</div>
            <table class="data-table">
                <tr class="data-row">
                    <td class="data-label">Nama Lengkap</td>
                    <td class="data-value">: {{ old('nama', $dataWarga->nama ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">NIK</td>
                    <td class="data-value">: {{ old('nik', $dataWarga->nik ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Nomor Kartu Keluarga (No. KK)</td>
                    <td class="data-value">: {{ old('no_kk', $dataWarga->no_kk ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Jenis Kelamin</td>
                    <td class="data-value">: {{ old('jenis_kelamin', $dataWarga->jenis_kelamin ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Tempat, Tanggal Lahir</td>
                    <td class="data-value">: {{ old('tempat_lahir', $dataWarga->tempat_lahir ?? '') }}, {{ old('tgl_lahir', $dataWarga->tgl_lahir ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Agama</td>
                    <td class="data-value">: {{ old('agama', $dataWarga->agama ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Kewarganegaraan</td>
                    <td class="data-value">: {{ old('kewarganegaraan', $dataWarga->kewarganegaraan ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Pendidikan Terakhir</td>
                    <td class="data-value">: {{ old('pendidikan', $dataWarga->pendidikan ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Status Pernikahan</td>
                    <td class="data-value">: {{ old('status_pernikahan', $dataWarga->status_pernikahan ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Pekerjaan</td>
                    <td class="data-value">: {{ old('pekerjaan', $dataWarga->pekerjaan ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Status</td>
                    <td class="data-value">: {{ old('status', $dataWarga->status ?? '') }}</td>
                </tr>
            </table>
        </section>

        <section>
            <div class="section-title">II. Data Alamat</div>
            <table class="data-table">
                <tr class="data-row">
                    <td class="data-label">Alamat Lengkap</td>
                    <td class="data-value">: {{ old('alamat', $dataWarga->alamat ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Nomor Rumah</td>
                    <td class="data-value">: {{ old('no_rumah', $dataWarga->no_rumah ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">RT / RW</td>
                    <td class="data-value">: {{ old('rt', $dataWarga->rt ?? '') }} / {{ old('rw', $dataWarga->rw ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Dusun</td>
                    <td class="data-value">: {{ old('dusun', $dataWarga->dusun ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Desa / Kelurahan</td>
                    <td class="data-value">: {{ old('desa', $dataWarga->desa ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Kecamatan</td>
                    <td class="data-value">: {{ old('kecamatan', $dataWarga->kecamatan ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Kabupaten / Kota</td>
                    <td class="data-value">: {{ old('kabupaten', $dataWarga->kabupaten ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Provinsi</td>
                    <td class="data-value">: {{ old('provinsi', $dataWarga->provinsi ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Kode Pos</td>
                    <td class="data-value">: {{ old('kode_pos', $dataWarga->kode_pos ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Koordinat Lokasi (Map)</td>
                    <td class="data-value">: {{ old('map', $dataWarga->map ?? '') }}</td>
                </tr>
            </table>
        </section>

        <section>
            <div class="section-title">III. Data Keluarga</div>
            <table class="data-table">
                <tr class="data-row">
                    <td class="data-label">Nama Ayah</td>
                    <td class="data-value">: {{ old('ayah', $dataWarga->ayah ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Nama Ibu</td>
                    <td class="data-value">: {{ old('ibu', $dataWarga->ibu ?? '') }}</td>
                </tr>
            </table>
        </section>

        <section>
            <div class="section-title">IV. Data Kontak</div>
            <table class="data-table">
                <tr class="data-row">
                    <td class="data-label">Nomor HP</td>
                    <td class="data-value">: {{ old('no_hp', $dataWarga->no_hp ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Email</td>
                    <td class="data-value">: {{ old('email', $dataWarga->email ?? '') }}</td>
                </tr>
            </table>
        </section>

        <section>
            <div class="section-title">V. Data Administrasi Sistem</div>
            <table class="data-table">
                <tr class="data-row">
                    <td class="data-label">Tanggal Data Dibuat</td>
                    <td class="data-value">: {{ old('created_at', $dataWarga->created_at ?? '') }}</td>
                </tr>
                <tr class="data-row">
                    <td class="data-label">Terakhir Diperbarui</td>
                    <td class="data-value">: {{ old('updated_at', $dataWarga->updated_at ?? '') }}</td>
                </tr>
            </table>
        </section>
       
        

    </div>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

         .header {
            display: table;
            font-size: 15px;
            /* font-weight: 300; */
            font-family: Arial, sans-serif;
            width: 100%;
            margin-bottom: 15px;
            margin-top: -10px;
        }
        .logo {
            width: 10%;
            /* Sesuaikan dengan lebar logo */
            float: left;
            margin-right: 1px;
            padding-right: 1px;
            padding-left: 50px;
            /* margin-right: 1px; Sesuaikan jarak antara logo dan teks */
            /* margin-top: 5px; Menyamakan tinggi logo dengan teks */
            margin-bottom: 5px; 
            z-index: 200;
        }

        .logo>img {
            margin-right: 1px;
            /* margin-left: 100px; */
            /* padding-right: 1px; */
            padding-left: 40px;
            /* padding-left: 40px */
            width: 60px;
            height: auto;
            align-items: right;
            text-align: left;
        }

        h4,
        h3,
        h2,
        .hp {
            font-size: 13px;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
        }

        .kop {
           text-align: center;
            font-size: 15px;
            font-family: Arial, sans-serif;
            margin-top: 1px;
            /* margin-left: 1px;
            /* Sesuaikan dengan jarak antara logo dan teks */
            padding-top: 5px;
            padding-left: 10px;
            padding-right: 60px;
            /* Menyamakan tinggi teks dengan logo */
        }

        .line {
            border-top: 3px solid black;
            width: 90%;
            height: 2px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            border-bottom: 1px solid black;
        }

        .judul {
            text-align: center;
            font-size: 15px;
            font-family: Arial, sans-serif;
            font-weight: bold;
            margin-top: 10px;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .ttd {
            margin-top: 20px;
        }

        .ttd-kiri,
        .ttd-kanan {
            width: 50%;
            /* Bagi ruang secara merata antara tanda tangan */
            float: left;
            text-align: left;
        }

        .ttd-kanan {
            text-align: right;
        }

        /* css qr */
        .qr-container {
            position: relative;
            display: flex;
            justify-content: center;
            /* aligns children horizontally (logo and QR code) */
            align-items: center;
            /* aligns children vertically (logo and QR code) */
            height: 15px;
            /* adjust the height as needed */
        }

        .object-a {
            position: absolute;
            top: 50%;
            /* Menggeser logo ke tengah vertikal */
            left: 50%;
            /* Menggeser logo ke tengah horizontal */
            transform: translate(-50%, -50%);
            /* Membuat logo berada di tengah-tengah */
        }

        .lego {
            position: absolute;
            top: 50%;
            /* Menggeser logo ke tengah vertikal */
            left: 50%;
            /* Menggeser logo ke tengah horizontal */
            transform: translate(-50%, -50%);
            /* Membuat logo berada di tengah-tengah */
            z-index: 2;
            /* Pastikan logo berada di lapisan terdepan */
        }
     
        .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 20px; /* Tinggi footer */
        border-top: 1px solid #ccc;
        padding: 10px 30px;
        font-size: 10px;
        color: #555;
        display: flex;
        align-items: center;
        justify-content: space-between; /* Memisahkan teks dan gambar */
    }

    .footer-text {
        text-align: left;
        flex: 1; /* Menggunakan ruang yang tersedia */
        padding-right: 20px;
        font-family: Arial, sans-serif;
        font-size: 13px;
        margin-top: -20px;
        font-style: italic;
    }

    .footer-image {
        width: 40px; /* Lebar gambar */
        height: 40px; /* Tinggi gambar */
        float: right;
        margin-top: -30px;
    }
     .warga-row {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            margin: 25px 0 30px 0;
            gap: 20px;
            }
            .warga-col {
            background: #f8fafc;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(44,62,80,0.07);
            padding: 18px 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 170px;
            }
            .warga-col.foto {
            flex: 0 0 120px;
            max-width: 120px;
            background: #f0f4f8;
            border: 1.5px solid #dbeafe;
            }
            .warga-col.detail {
            flex: 1 1 0;
            align-items: center;
            background: #fff;
            border: 1.5px solid #e5e7eb;
            min-width: 220px;
            padding: 10px 10px;
            }
            .warga-col.qr {
            flex: 0 0 120px;
            max-width: 120px;
            background: #f0f4f8;
            border: 1.5px solid #dbeafe;
            }
            .foto-img, .qr-img {
            width: 100px;
            height: 120px;
            object-fit: cover;
            border: 2px solid #ccc;
            border-radius: 8px;
            background: #fff;
            }
            .qr-img {
            height: 100px;
            width: 100px;
            }
            .foto-placeholder, .qr-placeholder {
            width: 100px;
            height: 120px;
            background: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 13px;
            }
            .qr-placeholder {
            height: 100px;
            }
            .warga-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
            margin-right: 8px;
            min-width: 90px;
            display: inline-block;
            }
            .warga-value {
            color: #222;
            font-size: 14px;
            font-weight: 600;
            }
            .warga-detail-row {
            margin-bottom: 7px;
            }
            .warga-col-title {
            font-size: 12px;
            margin-top: 7px;
            color: #3b82f6;
            font-style: italic;
            letter-spacing: 0.5px;
            }
            .section-title {
                font-size: 17px;
                font-weight: bold;
                color: #2c3e50;
                margin-bottom: 10px;
                margin-top: 25px;
                border-left: 4px solid #3498db;
                padding-left: 10px;
                background: #f5faff;
            }
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                font-size: 15px;
            }
            .data-table td {
                padding: 7px 10px;
                vertical-align: top;
            }
            .data-label {
                width: 220px;
                color: #34495e;
                font-weight: 500;
                background: #f8f8f8;
            }
            .data-value {
                color: #222;
            }
            .data-row {
                border-bottom: 1px solid #eaeaea;
            }

    </style>
</body>

</html>
