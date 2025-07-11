<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Silama</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/landing-page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/landing-page/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="" class="logo d-flex align-items-center me-auto">
                {{-- @if ($profilDesa->logo)
                    <img src="{{ asset('storage/' . $profilDesa->logo) }}" alt="Logo Desa" class="">
                @else --}}
                <img src="{{ asset('template/dist/assets/img/avatar/letter.gif') }}" alt="Logo Desa"
                    class="">
                {{-- @endif --}}
                <h1 class="sitename">Silama</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#beranda" class="active">Beranda</a></li>
                    <li><a href="#surat">Layanan Surat</a></li>
                    <li><a href="#prosedur">Prosedur Pengajuan</a></li>
                    <li><a href="#waktuPelayanan">Waktu Pelayanan</a></li>
                    <li><a href="#kontak">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">MASUK</a>
            <!-- <a class="btn-getstarted" href="{{ route('register') }}">DAFTAR</a> -->

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="beranda" class="hero section" style="padding-top: 90px; padding-bottom: 40px; position: relative; min-height: 70vh; background: linear-gradient(135deg, #e0f7fa 0%, #fff 100%); overflow: hidden;">
            <div class="hero-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
                <img src="{{ asset('/landing-page/assets/img/hero-bg-light.webp') }}" alt="" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.85;">
                <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: linear-gradient(120deg, rgba(54,136,162,0.12) 0%, rgba(255,255,255,0.7) 100%);"></div>
            </div>
            <div class="container text-center" style="position: relative; z-index: 2;">
                <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 45vh;">
                    <h1 data-aos="fade-up" style="font-size: 2.7rem; font-weight: 800; color: #3688a2; margin-bottom: 0.5rem; letter-spacing: 1px;">
                        <span id="typewriter-text" style="color: inherit; padding: 0.2em 0.7em; border-radius: 12px; text-align: center; box-shadow: 0 2px 12px rgba(54,136,162,0.08);">Selamat datang di <span style="color: #eab415;">Silama</span></span>
                    </h1>
                    <p data-aos="fade-up" data-aos-delay="100" style="font-size: 1.25rem; color: #444; margin-bottom: 1.2rem; background: rgba(255,255,255,0.6); display: inline-block; padding: 0.3em 1.2em; border-radius: 8px; box-shadow: 0 1px 8px rgba(54,136,162,0.06);">Sistem Layanan Masyarakat dan Administrasi Desa</p>
                    <div class="d-flex gap-3" data-aos="fade-up" data-aos-delay="200" style="margin-bottom: 1.5rem;">
                        <a href="#about" class="btn-get-started" style="font-weight: 600; font-size: 1.1rem; padding: 0.7em 2em; border-radius: 30px; background: #3688a2; color: #fff; box-shadow: 0 2px 8px rgba(54,136,162,0.12); transition: background 0.2s;">Ajukan Surat</a>
                        <a href="https://www.youtube.com/watch?v=yaMfl5OLLm4"
                            class="glightbox btn-watch-video d-flex align-items-center" style="font-weight: 500; font-size: 1.1rem; color: #3688a2; background: #fff; border: 1.5px solid #3688a2; border-radius: 30px; padding: 0.7em 1.7em; margin-left: 0.7em; box-shadow: 0 2px 8px rgba(54,136,162,0.08); transition: background 0.2s;"><i
                                class="bi bi-play-circle" style="font-size: 1.5rem; margin-right: 0.5em;"></i><span>Video Tutorial</span></a>
                    </div>
                    <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt=""
                        data-aos="zoom-out" data-aos-delay="300" style="max-width: 350px; border-radius: 18px; box-shadow: 0 4px 24px rgba(54,136,162,0.10); margin-top: 0.5rem;">
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section light-background">

            <div class="container" style="padding-top: -50px; padding-bottom: 30px;">

                <div class="row gy-4">

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h4 class="title"><a href="#" class="stretched-link">Pengajuan Surat Online</a>
                                </h4>
                                <p class="description">Ajukan berbagai jenis surat desa dengan mudah melalui platform
                                    kami,
                                    tanpa harus datang langsung ke kantor desa.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                            <div>
                                <h4 class="title"><a href="#" class="stretched-link">Pemantauan Status
                                        Surat</a></h4>
                                <p class="description">Pantau status pengajuan surat Anda secara real-time, mulai dari
                                    proses
                                    pengajuan hingga selesai diproses.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-clock-history"></i></div>
                            <div>
                                <h4 class="title"><a href="#" class="stretched-link">Riwayat Surat</a>
                                </h4>
                                <p class="description">Lihat riwayat lengkap dari semua surat yang pernah Anda ajukan,
                                    untuk
                                    keperluan dokumentasi dan arsip.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="surat" class="about section pb-6">

            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2>Jenis Surat</h2>
                <p>Berikut adalah beberapa jenis surat yang dapat Anda ajukan melalui sistem Silama</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-5 justify-content-center">

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKTM
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Surat Keterangan Tidak Mampu
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKD
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Surat Keterangan Domisili
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKAW
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Keterangan Ahli Waris
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKU
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Surat Keterangan Usaha
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}


                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKK
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Surat Keterangan Kematian
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKBK
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Keterangan Belum Kawin
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKCK
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Keterangan Catatan Kepolisian
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                    <!-- Card Surat Pengantar -->
                    {{-- @foreach ($jenisSurat as $item) --}}
                    <div class="col-lg-2 col-md-3 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-file-earmark-text"
                                        style="font-size: 2.5rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SKPKT
                                    {{-- {{ $item->nama_surat }} --}}
                                </h5>
                                <p class="card-text">Pernyataan Kepemilikan Tanah
                                    {{-- {{ $item->deskripsi }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Surat Pengantar -->
                    {{-- @endforeach --}}

                </div>
            </div>
        </section>



        <!-- /About Section -->

        <!-- Features Section -->
        <section id="prosedur" class="prosedur section" style="background-color: #f8f9fa; padding: 60px 0;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" style="text-align: center;">
                <h2 style="font-size: 36px; font-weight: bold; color: #333;">Prosedur Pengajuan Surat</h2>
                <p style="font-size: 18px; color: #6c757d;">Ikuti langkah-langkah berikut untuk mengajukan surat
                    melalui aplikasi Silama.</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="row g-4">
                            <!-- Card Langkah 1 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-person-plus" style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">
                                            Registrasi Akun</h5>
                                        <p class="card-text" style="color: #6c757d;">Daftar terlebih dahulu untuk
                                            membuat akun pengguna pada aplikasi Silama.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 2 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark" style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Pilih
                                            Jenis Surat</h5>
                                        <p class="card-text" style="color: #6c757d;">Pilih jenis surat yang ingin Anda
                                            ajukan dari daftar yang tersedia.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 3 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-pencil" style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Isi
                                            Formulir</h5>
                                        <p class="card-text" style="color: #6c757d;">Isi formulir pengajuan surat
                                            sesuai dengan data yang dibutuhkan.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 4 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-check-circle" style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">
                                            Verifikasi Data</h5>
                                        <p class="card-text" style="color: #6c757d;">Verifikasi data yang Anda
                                            masukkan untuk memastikan tidak ada kesalahan.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 5 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-send" style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Kirim
                                            Pengajuan</h5>
                                        <p class="card-text" style="color: #6c757d;">Setelah data terverifikasi, kirim
                                            pengajuan Anda untuk diproses.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 6 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-check"
                                            style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Tunggu
                                            Proses</h5>
                                        <p class="card-text" style="color: #6c757d;">Tunggu proses verifikasi dan
                                            persetujuan surat Anda.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- /Features Section -->

        <!-- Services Section -->
        <section id="waktuPelayanan" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2>Waktu Pelayanan</h2>
                <p>Pengajuan akan diproses pada waktu jam kerja, tapi anda bisa membuat pengajuan kapan saja dan dimana saja</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-5 justify-content-center">

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SENIN
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card SELASA -->
                    {{-- @endforeach --}}

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SELASA
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card RABU -->
                    {{-- @endforeach --}}

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">RABU
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card KAMIS -->
                    {{-- @endforeach --}}

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">KAMIS
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card JUM'AT -->
                    {{-- @endforeach --}}

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">JUM'AT
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card SABTU -->
                    {{-- @endforeach --}}

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">SABTU
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card MINGGU -->
                    {{-- @endforeach --}}

                    <!-- Card Senin -->
                    {{-- @foreach --}}
                    {{-- ($waktuPelayanan as $item) --}}
                    <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center p-4">
                                <div class="card-icon mb-3">
                                    <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                </div>
                                <h5 class="card-title mb-3">MINGGU
                                    {{-- {{ $item->hari }} --}}
                                </h5>
                                <p class="card-text">07:30 WIB s/d 15:30 WIB
                                    {{-- {{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }} --}}
                                </p>
                            </div>
                        </div>
                    </div><!-- End Card Senin -->
                    {{-- @endforeach --}}

                </div>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Contact Section -->
        <section id="kontak" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <p>Jln. Gallarang Kentang No. 5A Dusun Dongi, Manyampa, Ujung Loe, Bulukumba 92562
                                {{-- {{ $profilDesa->alamat }} --}}
                            </p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Nomor Telepon</h3>
                            <p>0852-9976-8443
                                {{-- {{ $profilDesa->kontak }} --}}
                            </p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>desamanyampa@gmail.com
                                {{-- {{ $profilDesa->email }} --}}
                            </p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <iframe title="Lokasi"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127096.51738187879!2d120.12021837235365!3d-5.45242183086912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbc063def3fe36d%3A0xa3016d6db93e61eb!2sKantor%20Desa%20Manyampa!5e0!3m2!1sen!2sid!4v1749018927183!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">SILAMA-Desa</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>
                            {{-- {{ $profilDesa->alamat }} --}}
                        </p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>0852-9976-8443
                                {{-- {{ $profilDesa->kontak }} --}}
                            </span></p>
                        <p><strong>Email:</strong> <span>desamanyampa@gmail.com
                                {{-- {{ $profilDesa->email }} --}}
                            </span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="#beranda" class="active">Beranda</a></li>
                        <li><a href="#surat">Layanan Surat</a></li>
                        <li><a href="#prosedur">Prosedur Pengajuan</a></li>
                        <li><a href="#waktuPelayanan">Waktu Pelayanan</a></li>
                        <li><a href="#kontak">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Smart Media Indonesia</strong><span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://smartmediaindonesia.com/">Mas-Wan</a> Desain Web & Aplikasi<a
                    href="https://apk62.com">
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6285299768443" target="_blank" id="whatsapp-float" class="whatsapp-float d-flex align-items-center justify-content-center" style="position: fixed; left: 30px; bottom: 30px; z-index: 9999; width: 50px; height: 50px; background: #25d366; color: #fff; border-radius: 50%; box-shadow: 0 2px 10px rgba(0,0,0,0.2); font-size: 2rem; text-align: center;">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/landing-page/assets/js/main.js') }}"></script>

    <!-- Typewriter Effect Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const el = document.getElementById('typewriter-text');
            const phrases = [
                'Selamat datang di <b>Silama-Desa</b>',
                'Sistem Layanan Masyarakat dan Administrasi Desa',
                'Mudah, Cepat, dan Efisien',
            ];
            let phraseIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingSpeed = 80;
            let pauseDelay = 1200;

            function typeLoop() {
                const currentPhrase = phrases[phraseIndex];
                let displayed = currentPhrase.substring(0, charIndex);
                el.innerHTML = displayed + '<span class="type-cursor">|</span>';

                if (!isDeleting && charIndex < currentPhrase.length) {
                    charIndex++;
                    setTimeout(typeLoop, typingSpeed);
                } else if (isDeleting && charIndex > 0) {
                    charIndex--;
                    setTimeout(typeLoop, typingSpeed / 2);
                } else {
                    if (!isDeleting) {
                        isDeleting = true;
                        setTimeout(typeLoop, pauseDelay);
                    } else {
                        isDeleting = false;
                        phraseIndex = (phraseIndex + 1) % phrases.length;
                        setTimeout(typeLoop, 500);
                    }
                }
            }
            typeLoop();
        });
    </script>

        <style>
        .type-cursor {
            display: inline-block;
            color: #3688a2, yellowgreen;
            font-weight: bold;
            font-size: 1em;
            animation: blink 1s steps(1) infinite;
        }
        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }
        .hero.section {
            padding-top: 90px !important;
            padding-bottom: 20px !important;
        }
        @media (max-width: 767.98px) {
            .hero.section {
                padding-top: 80px !important;
                padding-bottom: 10px !important;
            }
            .hero-img {
                max-width: 90vw !important;
            }
            .hero.section .btn-get-started,
            .hero.section .btn-watch-video {
                font-size: 0.95rem !important;
                padding: 0.5em 1.2em !important;
                border-radius: 22px !important;
            }
            .hero.section .d-flex.flex-column {
                min-height: unset !important;
            }
            .hero.section {
                min-height: 45vh !important;
            }
            .hero.section .d-flex.gap-3 {
                gap: 0.1rem !important;
            }
            #typewriter-text { 
                font-size: 1.7rem !important;
                text-align: justify;
                /* padding text: 5px 0; */
                padding-top: 10px !important;
                line-height: 0.2;
            }
        }
    </style>

    <!-- Optional: Custom CSS for WhatsApp Button (if needed) -->
    <style>
        .whatsapp-float:hover {
            background: #128c7e;
            color: #fff;
            text-decoration: none;
        }
        @media (max-width: 575.98px) {
            #whatsapp-float {
                left: 15px;
                bottom: 15px;
                width: 45px;
                height: 45px;
                font-size: 1.7rem;
            }
        }
    </style>

</body>

</html>