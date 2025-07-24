<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Penduduk</title>
    <!-- Tailwind CSS CDN untuk styling dasar -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Mengatur font Inter sebagai default */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5; /* Warna latar belakang lembut */
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Mengatur ke atas untuk konten yang lebih panjang */
            min-height: 100vh;
        }
        /* Kontainer utama untuk simulasi halaman PDF Legal */
        .pdf-container {
            width: 216mm; /* Lebar Legal */
            min-height: 356mm; /* Tinggi Legal */
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 25mm; /* Margin sekitar 2.5cm */
            box-sizing: border-box;
            color: #333;
            line-height: 1.6;
            margin: 20px 0; /* Margin atas/bawah agar terlihat di tengah */
            border-radius: 8px; /* Sudut membulat */
        }
        h1, h2, h3 {
            color: #1a202c; /* Warna heading lebih gelap */
            font-weight: 700;
            margin-bottom: 1rem;
        }
        h1 {
            font-size: 1.5rem; /* Ukuran font diperkecil menjadi 16px (1.5rem) untuk judul utama */
            text-align: center;
            margin-bottom: 1.5rem; /* Menyesuaikan margin bawah */
            color: #2c5282; /* Warna biru gelap */
        }
        h2 {
            font-size: 1.75rem; /* Ukuran font untuk sub-judul */
            border-bottom: 2px solid #e2e8f0; /* Garis bawah untuk bagian */
            padding-bottom: 0.5rem;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            color: #4a5568; /* Warna abu-abu gelap */
        }
        h3 {
            font-size: 1.25rem; /* Ukuran font untuk sub-sub-judul */
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        .data-row {
            display: flex;
            margin-bottom: 0.5rem;
        }
        .data-label {
            font-weight: 600;
            width: 180px; /* Lebar label tetap untuk perataan */
            flex-shrink: 0;
            color: #2d3748; /* Warna label */
        }
        .data-value {
            flex-grow: 1;
            color: #4a5568; /* Warna nilai data */
        }
        .photo-container {
            width: 120px;
            height: 150px;
            border: 1px solid #cbd5e0;
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 8px; /* Sudut membulat untuk foto */
        }
        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Memastikan gambar mengisi area tanpa distorsi */
        }
        .qr-code-container {
            width: 120px;
            height: 120px;
            border: 1px solid #cbd5e0;
            background-color: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 8px; /* Sudut membulat untuk QR Code */
            margin-top: 15px; /* Jarak antara foto dan QR Code */
        }
        .qr-code-container img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Memastikan QR Code terlihat jelas */
        }
        /* Menggunakan flexbox untuk menempatkan foto dan QR code di sisi kanan */
        .sidebar-right {
            float: right;
            margin-left: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        .header-section { /* Menambahkan kelas baru untuk header agar bisa mengatur padding-top */
            text-align: center;
            margin-bottom: 8px; /* Mengurangi margin bawah bawaan */
            padding-top: 20px; /* Menaikkan padding-top */
        }
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
            font-size: 0.875rem;
            color: #718096;
        }
        .download-button-container {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .download-button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .download-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="pdf-container" id="pdfContent">
        <header class="header-section">
            <h3 class="text-4xl font-extrabold text-blue-800">LAPORAN DATA PENDUDUK INDIVIDU</h3>
            <p class="text-lg text-gray-600">Pemerintah Desa/Kelurahan [Nama Desa/Kelurahan Anda]</p>
        </header>

        <div class="clearfix">
            <div class="sidebar-right">
                <div class="photo-container">
                    <!-- Placeholder untuk foto. Ganti 'path/to/your/photo.jpg' dengan URL atau base64 foto -->
                    <img src="https://placehold.co/120x150/E2E8F0/4A5568?text=FOTO" alt="Foto Penduduk" onerror="this.onerror=null;this.src='https://placehold.co/120x150/E2E8F0/4A5568?text=FOTO';">
                </div>
                <div class="qr-code-container">
                    <!-- Placeholder untuk QR Code. Anda bisa membuat QR Code dari NIK atau URL verifikasi -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=NIK_ATAU_DATA_VERIFIKASI_DI_SINI" alt="QR Code" onerror="this.onerror=null;this.src='https://placehold.co/120x120/E2E8F0/4A5568?text=QR';">
                </div>
            </div>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold">I. Data Identitas Diri</h2>
                <div class="data-row">
                    <span class="data-label">Nama Lengkap</span>
                    <span class="data-value">: {{nama}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">NIK</span>
                    <span class="data-value">: {{nik}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Nomor Kartu Keluarga (No. KK)</span>
                    <span class="data-value">: {{no_kk}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Jenis Kelamin</span>
                    <span class="data-value">: {{jenis_kelamin}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Tempat, Tanggal Lahir</span>
                    <span class="data-value">: {{tempat_lahir}}, {{tgl_lahir}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Agama</span>
                    <span class="data-value">: {{agama}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Kewarganegaraan</span>
                    <span class="data-value">: {{kewarganegaraan}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Pendidikan Terakhir</span>
                    <span class="data-value">: {{pendidikan}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Status Pernikahan</span>
                    <span class="data-value">: {{status_pernikahan}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Pekerjaan</span>
                    <span class="data-value">: {{pekerjaan}}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Status</span>
                    <span class="data-value">: {{status}}</span>
                </div>
            </section>
        </div> <!-- End clearfix -->

        <section class="mb-6">
            <h2 class="text-2xl font-semibold">II. Data Alamat</h2>
            <div class="data-row">
                <span class="data-label">Alamat Lengkap</span>
                <span class="data-value">: {{alamat}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Nomor Rumah</span>
                <span class="data-value">: {{no_rumah}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">RT / RW</span>
                <span class="data-value">: {{rt}} / {{rw}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Dusun</span>
                <span class="data-value">: {{dusun}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Desa / Kelurahan</span>
                <span class="data-value">: {{desa}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Kecamatan</span>
                <span class="data-value">: {{kecamatan}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Kabupaten / Kota</span>
                <span class="data-value">: {{kabupaten}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Provinsi</span>
                <span class="data-value">: {{provinsi}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Kode Pos</span>
                <span class="data-value">: {{kode_pos}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Koordinat Lokasi (Map)</span>
                <span class="data-value">: {{map}}</span>
            </div>
        </section>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold">III. Data Keluarga</h2>
            <div class="data-row">
                <span class="data-label">Nama Ayah</span>
                <span class="data-value">: {{ayah}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Nama Ibu</span>
                <span class="data-value">: {{ibu}}</span>
            </div>
        </section>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold">IV. Data Kontak</h2>
            <div class="data-row">
                <span class="data-label">Nomor HP</span>
                <span class="data-value">: {{no_hp}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Email</span>
                <span class="data-value">: {{email}}</span>
            </div>
        </section>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold">V. Data Administrasi Sistem</h2>
            <div class="data-row">
                <span class="data-label">Tanggal Data Dibuat</span>
                <span class="data-value">: {{created_at}}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Terakhir Diperbarui</span>
                <span class="data-value">: {{updated_at}}</span>
            </div>
            <!-- Tampilkan deleted_at hanya jika ada nilainya -->
            <div class="data-row">
                <span class="data-label">Tanggal Dihapus (Jika Ada)</span>
                <span class="data-value">: {{deleted_at}}</span>
            </div>
        </section>

        <footer class="footer">
            <p>&copy; 2025 [Nama Instansi/Penerbit]. Semua Hak Dilindungi.</p>
            <p>Dokumen ini dihasilkan secara otomatis oleh sistem.</p>
        </footer>
    </div>

    <div class="download-button-container">
        <button id="downloadPdfButton" class="download-button">Unduh Laporan PDF</button>
    </div>

    <!-- html2pdf.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        document.getElementById('downloadPdfButton').addEventListener('click', function () {
            const element = document.getElementById('pdfContent'); // Konten yang akan diubah menjadi PDF

            // Opsi untuk html2pdf
            const options = {
                margin: 10,
                filename: 'Laporan_Data_Penduduk.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'legal', orientation: 'portrait' } // Mengubah format ke 'legal'
            };

            // Menggunakan html2pdf untuk menghasilkan dan mengunduh PDF
            html2pdf().set(options).from(element).save();
        });
    </script>
</body>
</html>
