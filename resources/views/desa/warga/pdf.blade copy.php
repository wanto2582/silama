<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .logo {
            width: 10%; /* Sesuaikan dengan lebar logo */
            float: left;
            margin-right: 1px;
            padding-right: 1px;
            /* margin-right: 1px; Sesuaikan jarak antara logo dan teks */
            /* margin-top: 5px; Menyamakan tinggi logo dengan teks */
            margin-bottom: 15px; //Menyamakan tinggi logo dengan teks
            z-index: 200;
        }
        .logo > img {
            margin-right: 1px;
            /* margin-left: 100px; */
            padding-right: 1px;
            width: 80px;
            height: auto;
            align-items: center;
            text-align: center;
        }

        h4,h3,h2,.hp {
            text-align: center;
            margin: 0;
        }

        .kop {
            margin-right: 100px;
            padding-right: 100px;
            width: 90%;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            margin-left: 1px;
            padding-left: 1px; /* Sesuaikan dengan jarak antara logo dan teks */
            padding-top: 10px; /* Menyamakan tinggi teks dengan logo */
        }

        .line {
            border-top: 3px solid black;
            height: 2px;
            border-bottom: 1px solid black;
        }

        .judul {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .ttd {
            margin-top: 20px;
        }

        .ttd-kiri,
        .ttd-kanan {
            width: 50%; /* Bagi ruang secara merata antara tanda tangan */
            float: left;
            text-align: left;
        }

        .ttd-kanan {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
        <img src="src/images/logo.png" alt="logo" class="logo">
        </div>
        <div class="kop">
            <h4>PEMERINTAH KABUPATEN BULUKUMBA</h4>
            <h4>KECAMATAN UJUNG LOE</h4>
            <h2>DESA MANYAMPA</h2>
            <p class="hp">Jalan Gallarang Kentang No. 5A Ujung Loe Bulukumba 92562 Sulawesi Selatan</p>
        </div>
    </div>
    <hr class="line"/>
    <div class="container">
        <h3 class="judul">SURAT KEPUTUSAN KEPALA DESA</h3>
        <p style="text-align: center; margin-top: 0; padding: 0; margin-bottom: 20px;">Nomor. 141.1/ /424.302.2.10/2023</p>
        <p style="padding: 0 50px 0 50px">Yang bertanda tangan dibawah ini Kepala Desa Manyampa Kecamatan Ujung Loe Kabupaten Bulukumba</p>
        <ol style="padding: 0 100px 0 100px">
            <li>Menerangkan bahwa :</li>
            <li>name : {{$list->nama}}</li>
            <li>jk : {{$list->gender}}</li>
            <li>umur : {{$list->tempat_lahir}}</li>
            <li>lokasi : {{$list->tanggal_lahir}}</li>
            <li>sebab : {{$list->pekerjaan}}</li>
            <li>mati : {{$list->status_pernikahan}}</li>
            <li>alamat : {{$list->alamat}}</li>
        </ol>

        <p style="padding: 0 50px 0 50px">Bahwa lembaga tersebut diatas benar - benar  berdomisili di Dusun Dongi RT 14 RW 04 Desa Manyampa Kecamatan Beji Kabupaten Bulukumba.Surat Keterangan ini dibuat untuk persyaratan Permohonan Bantuan.
Demikian Surat Keterangan ini   dibuat dengan   sebenarnya   dan  apabila    dikemudian   hari
terdapat kekeliruan Surat Keterangan ini bisa dibetulkan kembali
</p>

<div class="ttd">
    <div class="ttd-kiri" style="text-align: center">
        <p style="margin-bottom: 5px;">Beji, 20 Januari 2023</p>
        <p style="margin-bottom: 5px;">Kepala Desa Manyampa</p>
        <br>
        <br>
        <br>
        <p style="margin-top: 20px;"><u>Yusuf</u></p>
    </div>
    <div class="ttd-kanan" style="text-align: center">
        <p style="margin-bottom: 5px;">Mengetahui</p>
        <p style="margin-bottom: 5px;">Ketua RT 14 RW 04</p>
        <br>
        <br>
        <br>
        <p style="margin-top: 20px;"><u>Yusuf</u></p>
    </div>
</div>

    </div>
</body>
</html>
