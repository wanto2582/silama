<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT UNDANGAN</title>
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
        al {
             margin: 10px 0;
                padding: 5px;
            border: 1px solid #999;
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
            text-align: right;
            font-size: 15px;
            font-family: Arial, sans-serif;
            font-weight: bold;
            margin-top: 10px;
            text-decoration: underline;
            text-transform: uppercase;
        }
         .judultengah {
            text-align: center;
            font-size: 15px;
            font-family: Arial, sans-serif;
            font-weight: bold;
            margin-top: 10px;
            /* text-decoration: underline; */
            text-transform: uppercase;
        }

        /* Gaya CSS untuk indentasi baris pertama */
        .alinea-paragraph {
            text-indent: 30px; /* Sesuaikan nilai ini sesuai keinginan Anda */
            margin-bottom: 1em; /* Jarak antar paragraf */
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
            line-height:1.5em;
            font-family: Arial, sans-serif;
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
            .nomor {
    text-align: center;
    margin-bottom: 30px;
  }
  .section-title {
    font-weight: bold;
    margin-bottom: 10px;
  }
  .content-row {
    display: flex;
    margin-bottom: 5px;
  }
  .content-label {
    width: 120px;
    flex-shrink: 0;
  }
  .content-value {
    flex-grow: 1;
     display: table;
    font-size: 15px;
     /* font-weight: 300; */
    font-family: Arial, sans-serif;
    width: 100%;
    margin-bottom: 15px;
  }
  .indent {
    margin-left: 20px;
  }
  .signature-block {
    margin-top: 50px;
    text-align: right;
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
         <h3 class="judultengah">SURAT PERINTAH TUGAS</h3>
        <x-nomor-suratkeluar type="spt" :index="$indeks[$pskeluar->id]+1" />       
    </div>
    </div>

                <table style="padding: 0 50px 0 50px; text-align: justify;">
                <tbody>
                <tr>
                <td style="text-align: left; width: 15%; vertical-align: top; padding: 15px 0px 0px 0px;" ><b>Dasar &nbsp;&nbsp;&nbsp;:</b></td>
                <td style="text-align: rigt; width: 5%; padding-left: 15px; vertical-align: top; padding: 15px 0px 0px 0px;" >&nbsp;&nbsp;-</td>
                <td style=" padding-left:0px; width: 110%;">{!! $listkeluar->paragraf_1 ?? '' !!} </td>
                </tr>
                </tbody>
                </table>

                <h3 class="judultengah">MEMERINTAHKAN</h3>
                

        <p style="padding: 0 50px 0 50px; text-align: justify;"><b>Kepada&nbsp;:</b></p>
        
                <table style="padding: 0 50px 0 145px; width: 100%; margin-top: -100px; border-collapse: collapse;">
                <tr>
                <td style="text-align: left; width: 15%;">Nama</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->yth ?? ''}}</td>
                </tr>
                <tr>
                <td style="text-align: left;">NIP</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->nip ?? ''}}</td>
                </tr>
                <tr>
                <td style="text-align: left;">Pangkat/Gol</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->pangkat_golongan ?? ''}}</td>
                </tr>
                <tr>
                <td style="text-align: left;">Jabatan</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->jabatan ?? ''}}</td>
                </tr>
                </table>
                
                 <table style="padding: 0 50px 0 50px; text-align: justify;">
                <tbody>
                <tr>
                <td style="text-align: left; width: 15%; vertical-align: top; padding: 15px 0px 0px 0px;" ><b>Untuk &nbsp;&nbsp;&nbsp;:</b></td>
                <td style="text-align: rigt; width: 5%; padding-left: 10px; vertical-align: top; padding: 15px -5px 0px 0px;" >1.</td>
                <td style=" padding-left:0px; width: 110%; margin-bottom: -20px; ">{!! $listkeluar->perihal ?? '' !!}</td>
                </tr>
                </tbody>
                </table>

                <table style="padding: 0 50px 0 125px; width: 100%; margin-top: -20px; border-collapse: collapse;">
                <tr>
                <td style="text-align: left; width: 20px;"></td>
                <td style="text-align: left; width: 10px;">&nbsp;&nbsp;di_&nbsp;&nbsp;</td>
                <td style="text-align: left; padding-left: 0px; width: 0%;"><b>{{$listkeluar->tempat ?? ''}}</b></td>
                </tr>
                </table>

                <table style="padding: 0 50px 0 125px; width: 100%; margin-top: 15px; border-collapse: collapse;">
                <tr>
                <td style="text-align: left; width: 20px;">2.</td>
                <td style="text-align: left; width: 180px;">Lama Perjalanan Dinas</td>
                <td style="text-align: left; padding-left: 0px; width: 0%;">: {{$listkeluar->lama_perjalanan ?? ''}}</td>
                </tr>
                <tr>
                    <td style="text-align: left;"></td>
                <td style="text-align: left;">Berangkat Tanggal</td>
                <td style="text-align: left; padding-left: 0px;">: {{$listkeluar->tgl_berangkat ?? ''}}</td>
                </tr>
                <tr>
                    <td style="text-align: left;"></td>
                <td style="text-align: left;">Kembali Tanggal</td>
                <td style="text-align: left; padding-left: 0px; ">: {{$listkeluar->tgl_pulang ?? ''}}</td>
                </tr>
                </table>



        <p style="padding: 0 50px 0 50px; line-height:1.5em; text-align: justify;">
        <br>          
        </p>
        
        <div class="ttd">
            <div class="ttd-kiri" style="text-align: center">
            </div>
            <div class="ttd-kanan" style="text-align: center">
                <br>
                <br>
                <p style="margin-bottom: 5px;">Manyampa, {{\Carbon\Carbon::parse($listkeluar->created_at)->isoFormat('D MMMM YYYY') ?? ''}}
                    <br style="margin-bottom: 5px;"><b>KEPALA DESA,</b>
                </p>
                <br>
                <br>
                <br>
                @if ($pskeluar->status == "Selesai")
                <div class="qr-container">
                    <img style="width: 20px; margin-top: -25px;" src="logo.png" class="lego" alt="">
                    <img class="object-a" style="margin-top: -25px;" src="data:image/png;base64, {!! base64_encode(QrCode::size(80)->generate('https://silama.apk62.com/cekkeluar/surat/'.$listkeluar->id)) !!} ">
                </div>
                @endif
                <br>
                <br>
                <p style="margin-top: -25px;"><u><b>ABBAS MADDA</b></u></p> 
            </div>
        </div>   

    </div>

    <div class="container">
        <div class="ttdkiri">
                <br>
                <br>    
                <br>
                <br>
                <br>   
                <br>
                <br>
            <table style="padding: 0 50px 0 50px; margin-top: 130px; text-align: justify; border-collapse: collapse;">
            <tr>
                <td style="text-align: left; "><u>Tembusan :</u></td>
            </tr>
            </table>
            </div>
        </div>   
        <div class="container">
        <div class="ttdkiri">
                
            <table style="padding: 0 50px 0 30px; margin-top: -10px; text-align: justify; border-collapse: collapse;">
            <tr>
                <td style="text-align: left; ">{!! $listkeluar->tembusan ?? '' !!}</td>
            </tr>
            </table>
            </div>
        </div>   

    </div>
    
</body>

</html>
