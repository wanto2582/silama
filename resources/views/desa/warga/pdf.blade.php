<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT KETERANGAN DOMISILI</title>
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

        .poto {
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

        .poto>img {
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


     /* body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: flex-start;
} */

.cv-container {
    width: 21cm; /* Lebar A4 */
    height: 29.7cm; /* Tinggi A4 */
    border-collapse: collapse; /* Menghilangkan spasi antar sel tabel */
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    overflow: hidden; /* Penting untuk mencegah konten meluap */
    color: #333;
    font-size: 12px; /* Ukuran font dasar untuk keseluruhan CV */
}

/* --- Header Utama --- */
.header-main-cell {
    padding: 0; /* Padding utama akan diatur di tabel inner */
    background-color: #e0e0e0; /* Warna abu-abu background header */
}

.header-inner-table {
    width: 100%;
    border-collapse: collapse;
}

.header-inner-table td {
    padding: 0; /* Menghilangkan padding default td */
    vertical-align: top;
}

.header-left {
    padding: 15px 10px 15px 30px; /* Padding spesifik untuk area nama */
    width: 35%; /* Proporsi lebar */
    box-sizing: border-box;
}

.header-left h1 {
    font-size: 28px; /* Ukuran nama */
    margin: 0;
    color: #333;
    letter-spacing: 0.5px;
}

.header-left .position {
    font-size: 14px; /* Ukuran posisi */
    color: #555;
    margin: 5px 0 0 0;
    text-transform: uppercase;
}

.header-center {
    width: 15%; /* Proporsi lebar QR */
    text-align: center;
    padding-top: 5px; /* Sedikit padding untuk QR */
}

.qr-code {
    display: inline-block; /* Agar bisa diatur padding/margin */
    background-color: #fff; /* Background putih QR */
    padding: 3px;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.qr-code img {
    width: 70px; /* Ukuran QR */
    height: 70px;
    display: block;
}

.qr-code .qr-label {
    margin: 3px 0 0 0;
    font-size: 9px;
    color: #555;
    font-weight: bold;
}

.header-right {
    width: 50%; /* Proporsi lebar foto */
    text-align: right;
    padding-right: 30px; /* Padding kanan untuk foto */
}

.profile-photo {
    width: 160px; /* Lebar foto */
    height: 190px; /* Tinggi foto */
    overflow: hidden;
    display: inline-block; /* Agar bisa diatur align */
    margin-top: -30px; /* Menggeser foto ke atas untuk tampilan overlap */
    margin-bottom: -15px; /* Mengatur bagian bawah foto */
    border: 3px solid #000; /* Border hitam foto */
    background-color: #fff;
}

.profile-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* --- Kolom Kiri & Kanan Utama --- */
.left-column {
    width: 45%; /* Lebar kolom kiri */
    padding: 20px 15px 20px 30px; /* Padding disesuaikan */
    vertical-align: top;
    box-sizing: border-box;
}

.right-column {
    width: 55%; /* Lebar kolom kanan */
    padding: 20px 30px 20px 15px; /* Padding disesuaikan */
    vertical-align: top;
    box-sizing: border-box;
    position: relative; /* Untuk border vertikal */
}

/* Garis vertikal di antara kolom */
.right-column::before {
    content: '';
    position: absolute;
    top: 20px;
    bottom: 20px;
    left: 0;
    width: 1px; /* Lebar garis */
    background-color: #ccc; /* Warna garis */
}


/* --- Styling Section Umum --- */
.section {
    margin-bottom: 25px; /* Margin antar section */
}

.section h2 {
    font-size: 15px; /* Ukuran judul section */
    text-transform: uppercase;
    color: #000; /* Warna hitam untuk judul */
    margin-bottom: 12px; /* Margin bawah judul */
    padding-bottom: 5px;
    border-bottom: 1px solid #ddd; /* Garis bawah judul */
    letter-spacing: 0.5px;
    font-weight: bold;
}

.section p {
    margin: 0;
    line-height: 1.4;
    font-size: 11px; /* Ukuran font umum untuk paragraf */
}

/* --- Kontak (Kolom Kiri) --- */
.contact-info p {
    margin-bottom: 5px;
}

.contact-info .icon-placeholder {
    width: 10px; /* Ukuran ikon kontak */
    height: 10px;
    background-color: #333; /* Warna ikon kontak */
    margin-right: 8px;
    vertical-align: middle;
    display: inline-block; /* Agar bisa diatur margin */
}

.contact-info .contact-details {
    margin-top: 10px;
    font-size: 10px; /* Ukuran font detail kontak dikurangi */
    line-height: 1.3;
}

/* --- Pendidikan & Pengalaman (Kolom Kiri & Kanan) --- */
.item {
    margin-bottom: 15px;
}

.item p {
    margin-bottom: 2px;
}

.item .school-year,
.item .job-title,
.item .organization-title,
.item .seminar-title {
    font-size: 12px; /* Ukuran font tahun/jabatan */
    font-weight: bold;
    color: #555;
}

.item .university-name,
.item .company-name,
.item .organization-name,
.item .seminar-name {
    font-size: 12px; /* Ukuran font nama institusi/perusahaan */
    font-weight: bold;
    color: #333;
    margin-top: 2px;
}

.item .description {
    font-size: 10px; /* Ukuran font deskripsi dikurangi */
    color: #666;
    margin-top: 5px;
}

/* --- Software Skill (Kolom Kiri) --- */
.software-skills-table {
    width: 100%;
    border-collapse: collapse;
}

.software-skills-table td {
    padding: 3px 0;
    border: none;
    vertical-align: middle;
}

.software-skills-table td p {
    font-size: 11px; /* Ukuran font nama software */
    white-space: nowrap;
}

.software-skills-table .skill-bar {
    width: 100%; /* Lebar bar skill */
    height: 4px;
    background-color: #e0e0e0;
    border-radius: 2px;
    overflow: hidden;
}

.software-skills-table .skill-bar span {
    display: block;
    height: 100%;
    background-color: #333; /* Warna bar skill */
    border-radius: 2px;
}

/* --- Bahasa (Kolom Kanan) --- */
.language-right-table {
    width: 100%;
    border-collapse: collapse;
}

.language-right-table td {
    width: 50%; /* Dua kolom, masing-masing 50% */
    text-align: center;
    padding: 5px 0;
    border: none;
}

.language-right-table p {
    font-size: 12px; /* Ukuran font bahasa */
    font-weight: bold;
    margin: 0;
}

.language-right-table .status {
    font-size: 10px; /* Ukuran font status bahasa */
    color: #777;
    font-weight: normal;
    margin-top: 2px;
}

/* --- Footer Utama --- */
.footer-main-cell {
    background-color: #e0e0e0; /* Warna abu-abu background footer */
    padding: 0;
}

.footer-inner-table {
    width: 100%;
    border-collapse: collapse;
}

.footer-inner-table td {
    padding: 10px 0; /* Padding vertikal footer */
    vertical-align: middle;
}

.hobi-section {
    padding-left: 30px; /* Padding kiri untuk hobi */
    display: flex; /* Menggunakan flexbox untuk item hobi */
    justify-content: space-around;
    align-items: center;
    width: 60%; /* Proporsi lebar untuk hobi */
    box-sizing: border-box;
}

.hobi-item {
    text-align: center;
    flex-grow: 1; /* Agar item mengisi ruang */
    padding: 0 5px;
}

.hobi-item .icon-placeholder {
    width: 20px; /* Ukuran ikon hobi */
    height: 20px;
    background-color: #333;
    display: block; /* Agar ikon berada di atas teks */
    margin: 0 auto 5px auto; /* Tengahkan ikon dan beri margin bawah */
    border-radius: 50%; /* Membuat ikon lingkaran */
}

.hobi-item p {
    font-size: 10px; /* Ukuran font hobi */
    color: #555;
    text-transform: uppercase;
    font-weight: bold;
    margin: 0;
}

.cv-details-section {
    padding-right: 30px; /* Padding kanan untuk detail CV */
    text-align: right;
    width: 40%; /* Proporsi lebar untuk detail CV */
    box-sizing: border-box;
}

.cv-details-section p {
    font-size: 10px; /* Ukuran font detail CV */
    color: #555;
    margin: 0;
    line-height: 1.3;
}

/* Print Specific Styles */
@media print {
    body {
        margin: 0;
        padding: 0;
        background-color: #fff;
    }
    .cv-container {
        box-shadow: none;
        border: none;
        width: 100%;
        height: 29.7cm; /* Pertahankan tinggi A4 saat cetak */
        margin: 0;
        overflow: hidden; /* Pastikan tidak ada scrollbar saat dicetak */
    }

    /* Hilangkan scrollbar jika ada */
    .left-column, .right-column, .sidebar {
        overflow-y: hidden !important;
    }

    /* Memastikan setiap bagian tidak terpotong di tengah halaman */
    .section, .item, .header-main-cell, .footer-main-cell {
        page-break-inside: avoid !important;
        -webkit-column-break-inside: avoid !important;
        break-inside: avoid !important;
    }
}
    </style>
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
        <h3 class="judul">Data Profil Warga</h3>
        <h3 class="nama"><em>{{ old('nama', $dataWarga->nama ?? '') }}</em></h3>
    </div>
        <BR>
         <table>
            <tr>
            </tr>
             <tr>
            {{-- BLOK KIRI --}}
            <td class="left-column" style="width: 320px;">
                  
            <div class="header">
            <div class="logo" >
            {{-- <img src="src/images/logo.png" alt="logo" class="logo" style="width: 100px; height: 100px; padding-left: -20px;"><SPAN> --}}
            <img src="src/images/photo4.jpg" alt="Foto Warga" class="foto-img" style="width: 100px; height: 100px; margin-left: 120px;">
             </div>
                <div class="item" style="margin-left: -5px;">
                        <table style="width:100%; font-size:12px;">
                            <tr>
                                <td style="width:10px;"><b>NIK</b></td>
                                <td style="text-align:center;">:</td>
                                <td><em>{{ old('nik', $dataWarga->nik ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>Agama</b></td>
                                <td style="text-align:center;">:</td>
                                <td><em>{{ old('agama', $dataWarga->agama ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td style="text-align:center;">:</td>
                                <td><em>{{ old('status_pernikahan', $dataWarga->status_pernikahan ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>Pekerjaan</b></td>
                                <td style="text-align:center;">:</td>
                                <td><em>{{ old('pekerjaan', $dataWarga->pekerjaan ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>Pendidikan</b></td>
                                <td style="text-align:center;">:</td>
                                <td><em>{{ old('no_tlp', $dataWarga->no_tlp ?? '') }}</em></td>
                            </tr>
                        </table>

                    </div>
                     </div>
                <div class="section education">
                    <h2 style="text-align: left;">KETERANGAN</h2>
                    <div class="item">
                        <p class="university-name">............</p>
                        <p class="school-year">............</p>                   
                        <p class="university-name">............</p>
                        <p class="school-year">............</p>
                    </div>
                </div>

            </td>
            {{-- BLOK KANAN --}}
             <td class="right-column" style="width: 300px;">
                  
            <div class="header">
            <div class="logo" >
            {{-- <img src="src/images/logo.png" alt="logo" class="logo" style="width: 100px; height: 100px; padding-left: -20px;"><SPAN> --}}
            <img src="src/images/qrcode.png" alt="Foto Warga" class="foto-img" style="width: 100px; height: 100px; margin-left: -90px;">
             </div>
                <div class="item" style="margin-left: 105px;">
                     <table style="width:200px; font-size:12px;">
                            <tr>
                                <td style="width:60px;"><b>Dusun</b></td>
                                <td style="text-align:center;">:</td>
                                <td style="width:130px; text-align:justify;"><em>{{ old('dusun', $dataWarga->dusun ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>RT / RW</b></td>
                                <td style="text-align:center;">:</td>
                                <td style="width:130px; text-align:justify;"><em>{{ old('rt', $dataWarga->rt ?? '') }} / {{ old('rw', $dataWarga->rw ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>No Rumah</b></td>
                                <td style="text-align:center;">:</td>
                                <td style="width:130px; text-align:justify;"><em>{{ old('no_rumah', $dataWarga->no_rumah ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>No Telp</b></td>
                                <td style="text-align:center;">:</td>
                                <td style="width:130px; text-align:justify;"><em>{{ old('no_tlp', $dataWarga->no_tlp ?? '') }}</em></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td style="text-align:left;">:</td>
                                <td style="width:130px; text-align:justify;"><em>
                                    {{-- {{ old('alamat', $dataWarga->alamat ?? '') }} --}}
                                    Jl. Manyampa
                                </em></td>
                            </tr>
                        </table>

                    </div>
                     </div>
                <div class="section education">
                    <h2 style="text-align: left;">KETERANGAN</h2>
                    <div class="item">
                        <p class="university-name">............</p>
                        <p class="school-year">............</p>                   
                        <p class="university-name">............</p>
                        <p class="school-year">............</p>
                    </div>
                </div>

            </td>
        </tr>
    </table>
</body>

</html>
