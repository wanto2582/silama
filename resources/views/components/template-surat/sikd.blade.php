<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT IZIN KEPALA DESA</title>
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
            margin-bottom: 5px; //Menyamakan tinggi logo dengan teks
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
        <h3 class="judul">SURAT KETERANGAN KELAHIRAN</h3>
        <x-nomor-surat type="skl" :index="$indeks[$ps->id]+1" />
        <p style="padding: 0 50px 0 50px; text-align: justify;">Yang bertanda tangan di bawah ini :</p>
        <table style="padding: 0 90px 0 90px; width: 100%; border-collapse: collapse;">
            <tr>
                <td style="text-align: left; width: 35%;">Nama</td>
                <td style="text-align: left; padding-left: 0px;">: ABBAS MADDA</td>
            </tr>
            <tr>
                <td style="text-align: left;">Jabatan</td>
                <td style="text-align: left; padding-left: 0px;">: Kepala Desa</td>
            </tr>
        </table>
        <p style="padding: 0 50px 0 50px; text-align: justify;">dengan ini menerangkan bahwa :</p>
        <table style="padding: 0 90px 0 90px; width: 100%; border-collapse: collapse;">
            <tr>
                <td style="text-align: left; width: 35%;">Nama Lengkap Anak</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->nama ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Anak Ke</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->anak_ke ?? ''}} ( {{$list->anak_ke_angka ?? ''}} )</td>
            </tr>
            <tr>
                <td style="text-align: left;">Jenis Kelamin</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->anak_gender ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Dilahirkan di</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->anak_tempat_lahir ?? ''}}, {{$list->anak_tanggal_lahir ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Alamat Anak</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->anak_alamat ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Penolong Kelahiran</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->penolong ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Alamat Penolong</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->penolong_alamat ?? ''}}</td>
            </tr>
        </table>
        <p style="padding: 0 50px 0 50px; text-align: justify;">Adalah anak kandung dari suami istri tersebut di bawah ini :</p>
        <table style="padding: 0 90px 0 90px; width: 100%; border-collapse: collapse;">
            <tr>
                <td colspan="2" style="font-weight: bold;">IBU</td>
            </tr>
            <tr>
                <td style="text-align: left; width: 35%;">NIK</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ibu_nik ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Nama</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ibu_nama ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Tempat kelahiran</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ibu_tempat_lahir ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Tanggal Lahir</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ibu_tanggal_lahir ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Alamat</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ibu_alamat ?? ''}}</td>
            </tr>
            <br>
            <tr>
                <td colspan="2" style="font-weight: bold;">AYAH</td>
            </tr>
            <tr>
                <td style="text-align: left;">NIK</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ayah_nik ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Nama</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ayah_nama ?? ''}}</td>
            </tr>
            <tr> 
                <td style="text-align: left;">Tempat kelahiran</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ayah_tempat_lahir ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Tanggal Lahir</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ayah_tanggal_lahir ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Alamat</td>
                <td style="text-align: left; padding-left: 0px;">: {{$list->ayah_alamat ?? ''}}</td>
            </tr>
        </table>
        <p style="padding: 0 50px 0 50px; text-align: justify;">
            Surat keterangan ini dipergunakan untuk : Persyaratan pembuatan akta kelahiran.
        </p>
        <p style="padding: 0 50px 0 50px; text-align: justify;">
            Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
        </p>

       <div class="ttd">
            <div class="ttd-kiri" style="text-align: center">

            </div>
            <div class="ttd-kanan" style="text-align: center">
                <br>
                <br>
                <p style="margin-bottom: 5px;">Manyampa, {{\Carbon\Carbon::parse($list->created_at)->isoFormat('D MMMM YYYY') ?? ''}}
                    <br style="margin-bottom: 5px;"><b>KEPALA DESA,</b>
                </p>
                <br>
                <br>
                <br>
                @if ($ps->status == "Selesai")
                <div class="qr-container">
                    <img style="width: 20px; margin-top: -25px;" src="logo.png" class="lego" alt="">
                    <img class="object-a" style="margin-top: -25px;" src="data:image/png;base64, {!! base64_encode(QrCode::size(80)->generate('http://127.0.0.1:8000/cek/surat/'.$list->id)) !!} ">
                </div>
                @endif
                <br>
                <br>
                <p style="margin-top: -25px;"><u><b>ABBAS MADDA</b></u></p>
            </div>
        </div>

    </div>
</body>

</html>