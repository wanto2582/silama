<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Dokumen PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f0f2f5;
        }
        .pdf-container {
            width: 80%; /* Atur lebar container PDF */
            max-width: 900px; /* Batasi lebar maksimum */
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }
        h1 {
            color: #333;
            margin-bottom: 25px;
        }
        p {
            color: #666;
            margin-top: 15px;
            font-size: 0.9em;
            text-align: center;
        }
        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .pdf-container {
                width: 95%;
            }
            embed, iframe {
                height: 400px !important; /* Sesuaikan tinggi untuk perangkat mobile */
            }
        }
    </style>
</head>
<body>

    <h1>Dokumen Surat Izin Anda</h1>

    <div class="pdf-container">
        <!-- Menggunakan <embed> untuk menampilkan PDF.
             src akan mengarah ke route controller yang melayani PDF. -->
        <embed src="{{ route('surat.view.public', ['filename' => 'surat_izin.pdf']) }}" type="application/pdf" width="100%" height="600px" />

        <!-- Anda juga bisa menggunakan <iframe> sebagai alternatif: -->
        <!-- <iframe src="{{ route('surat.view.public', ['filename' => 'surat_izin.pdf']) }}" width="100%" height="600px" frameborder="0"></iframe> -->
    </div>

    <p>
        Ini adalah pratinjau dokumen PDF Anda. Dokumen ini ditampilkan langsung di *browser* Anda.
    </p>

</body>
</html>
