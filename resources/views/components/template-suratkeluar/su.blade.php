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

        /* Gaya CSS untuk indentasi baris pertama */
        .alinea-paragraph {
            text-indent: 30px; /* Sesuaikan nilai ini sesuai keinginan Anda */
            margin-bottom: 1em; /* Jarak antar paragraf */
        }

        .ttd {
            margin-top: 0px;
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
        <div class="ttdkanan" style="padding: 0 90px 0 90px; width: 80%; text-align: right; border-collapse: collapse;" >
            {{$listkeluar->nik ?? ''}}
        </div>

        <table style="padding: 0 50px 0 50px; margin-top: 20px; text-align: justify;">
            <tr>
                <td style="text-align: left; width: 30%;">Nomor </td>
                <td style="text-align: left; padding-left: 10px;">:
                    </td>
            </tr>
            <tr>
                <td style="text-align: left;">Sifat</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->sifat ?? ''}} </td>
            </tr>
            <tr>
                <td style="text-align: left;">Lampiran</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->lampiran ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Hal</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->perihal ?? ''}}</td>
            </tr>
           
        </table>

        <table style="padding: 0 50px 0 50px; margin-top: 20px; text-align: justify;">
            
            <tr>
                <td style="text-align: left; vertical-align: top; padding: 15px -20px 0px 0px;">Yth.</td>
                <td style="text-align: left; padding-left:0px; padding-top: -30px; padding: 0px 0px 0px 0px; ">
                    {!! $listkeluar->yth ?? ''!!}</td>
            </tr>
           
        </table>
    
    
        {{-- <p style="padding: 0 50px 0 52px; text-align: justify;">
        Yth. &nbsp; <span>{!! $listkeluar->yth ?? ''!!}</span></p> --}}
         <p style="padding: 0 50px 0 50px; padding-left: 90px; line-height:1em; text-align: justify;">
        Masing-masing</p>
          <p style="padding: 0 50px 0 50px; padding-left: 90px; margin-top: -10px; line-height:1 em; text-align: justify;">
        di_</p>
        <p style="padding: 0 50px 0 50px; padding-left: 140px; line-height:1 em; margin-top: -10px; text-align: justify;">
        Tempat</p>
        
        <div class="ttdkanan" style="padding: 0 50px 0 140px; margin-top: -40px; text-indent:40px; line-height:1.5em; text-align: justify; border-collapse: collapse;" >
        {!! $listkeluar->paragraf_1 ?? '' !!}
        </div>
        {{-- <p style="padding: 0 50px 0 52px; text-align: justify;">
         {!! $listkeluar->paragraf_1 ?? '' !!}</p>
         --}}
        <table style="padding: 0 50px 0 50px; padding-left: 180px;  text-align: justify;">
            
            <tr>
                <td style="text-align: left;">Hari/tanggal</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->hari ?? ''}} </td>
            </tr>
            <tr>
                <td style="text-align: left;">Pukul</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->waktu ?? ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left;">Tempat</td>
                <td style="text-align: left; padding-left: 10px;">: {{$listkeluar->tempat ?? ''}}</td>
            </tr>
           
        </table>
        <div class="ttdkanan" style="padding: 0 50px 0 140px; margin-top: 0px; line-height:1.5em; text-align: justify; border-collapse: collapse;" >
        {!! $listkeluar->paragraf_2 ?? '' !!}
        </div>
        <p style="padding: 0 50px 0 140px; line-height:1.5em; margin-bottom: -20; text-indent:30px; text-align: justify;">
        Demikian surat ini disampaikan untuk diketahui sebagaimana mestinya, atas perhatian dan kerjasamanya diucapkan terima kasih.
        <br>          
        </p>
        
        <div class="ttd">
            <div class="ttd-kiri" style="text-align: center">
            </div>
            <div class="ttd-kanan" style="text-align: center">
                <br>
                <br>
                <p style="margin-bottom: 5px;">Manyampa, {{\Carbon\Carbon::parse($listkeluar->created_at)->isoFormat('D MMMM YYYY') ?? ''}}
                    <br style="margin-bottom: -20px;"><b>KEPALA DESA,</b>
                </p>
                <br>
                <br>
                <br>
                @if ($pskeluar->status == "Selesai")
                <div class="qr-container">
                    <img style="width: 20px; margin-top: -25px;" src="logo.png" class="lego" alt="">
                    <img class="object-a" style="margin-top: -25px;" src="data:image/png;base64, {!! base64_encode(QrCode::size(80)->generate('http://127.0.0.1:8000/cekkeluar/surat/'.$listkeluar->id)) !!} ">
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
