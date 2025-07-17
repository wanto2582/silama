<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cek Dokumen Silama</title>
    <meta name="Cek dokumen silama" content="">
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
                <h1 class="sitename">Silama - Desa</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#beranda" class="active">Beranda</a></li>

                    <li><a href="#kontak">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- <a class="btn-getstarted" href="{{ route('login') }}">MASUK</a> --}}
            <!-- <a class="btn-getstarted" href="{{ route('register') }}">DAFTAR</a> -->

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="beranda" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('/landing-page/assets/img/hero-bg-light.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="d-flex flex-column justify-content-center align-items-center">

                    <div class="container text-center" style="max-width: 700px; margin-top: 30px;">
                        <div class="card shadow p-4" style="border-radius: 18px;">
                            <div class="mb-4">
                                <img src="{{asset('vendors/images/logo-pemkab.png')}}" alt="Logo Pemkab" style="height: 80px;">
                                <h3 class="mt-3 mb-1" style="font-weight: bold; color: #1a237e;">HASIL CEK DOKUMEN</h3>
                                <h4 style="font-size: 17px; color: #0000000;"><b>
                                Naskah ini dikelola dengan Aplikasi Sistem Layanan dan Administrasi serta Kearsipan Desa Manyampa yang Dinamis Terintegrasi</b></h4>
                            </div>
                            @php
                                \Carbon\Carbon::setLocale('id');
                            @endphp
                            @if($pskeluar)
                                @if($pskeluar->status == 'Selesai')
                                    <div class="alert alert-success mb-3" style="font-size: 17px;">
                                        <b>✅ Dokumen Valid</b>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-2">
                                            <div class="p-3 border rounded bg-light h-100">
                                                <h5 class="mb-2" style="color:#1a237e;"><i class="bi bi-person-badge"></i> Data Dokumen</h5>
                                                <ul class="list-unstyled mb-0" style="font-size: 16px;">
                                                    <li><b>__:</b> {{ $listkeluar->nama }}</li>
                                                    <li><b>__:</b> {{ $listkeluar->nik }}</li>
                                                    <li><b>__:</b> {{ $listkeluar->jenis_surat }}</li>
                                                    <li><b>__:</b> {{ $listkeluar->tujuan }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="p-3 border rounded bg-light h-100">
                                                <h5 class="mb-2" style="color:#1a237e;"><i class="bi bi-pen"></i> Tanda Tangan</h5>
                                                <ul class="list-unstyled mb-0" style="font-size: 16px;">
                                                    <li><b>Ditandatangani oleh:</b> <span style="color:#1a237e">Abbas Madda</span></li>
                                                    <li><b>Jabatan:</b> <span style="color:#1a237e">Kepala Desa</span></li>
                                                    <li><b>Unit Kerja:</b> <span style="color:#1a237e">Desa Manyampa</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-2">
                                            <div class="p-3 border rounded bg-light h-100">
                                                <h5 class="mb-2" style="color:#1a237e;"><i class="bi bi-calendar-check"></i> Waktu Tanda Tangan</h5>
                                                <div style="font-size: 16px;">
                                                    <b>Ditandatangani pada:</b> {{ \Carbon\Carbon::parse($pskeluar->created_at)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="p-3 border rounded bg-light h-100">
                                                <h5 class="mb-2" style="color:red;"><i class="bi bi-exclamation-triangle"></i> Kadaluarsa</h5>
                                                <div style="font-size: 16px;">
                                                    <b style="color:red">Kadaluarsa pada:</b>
                                                    <span style="color:red">{{ \Carbon\Carbon::parse($pskeluar->created_at)->copy()->addMonths(1)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-outline-primary" type="button" onclick="document.getElementById('pdf-preview').style.display = (document.getElementById('pdf-preview').style.display === 'none' ? 'block' : 'none')">
                                            <i class="bi bi-eye"></i> Lihat File Digital
                                        </button>
                                    </div>
                                    <div id="pdf-preview" style="display: none; margin-bottom: 20px;">
                                        <iframe src="data:application/pdf;base64,{{ $pdfContent }}" width="100%" height="600px" frameborder="0" style="border:1px solid #ccc;"></iframe>
                                    </div>
                                @elseif($pskeluar->status == 'Expired')
                                    <div class="alert alert-danger mb-3" style="font-size: 17px;">
                                        <b>❌ Dokumen Expired</b>
                                    </div>
                                    <div class="p-3 border rounded bg-light text-start mb-3" style="font-size: 16px;">
                                        <span>Tanda tangan dan dokumen ini telah kadaluarsa pada:</span><br>
                                        <span style="color:red">{{ \Carbon\Carbon::parse($pskeluar->created_at)->copy()->addMonths(1)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }}</span>
                                        <br><b style="color: red;">Dokumen ini tidak dapat dipergunakan lagi.</b>
                                    </div>
                                @else
                                    <div class="alert alert-warning mb-3" style="font-size: 17px;">
                                        <b>❓ Status Tidak Diketahui</b>
                                    </div>
                                    <div class="p-3 border rounded bg-light text-start mb-3" style="font-size: 16px;">
                                        Status dokumen dan tanda tangan tidak dapat diidentifikasi.
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-danger mb-3" style="font-size: 17px;">
                                    <b>❌ Data Tidak Ditemukan</b>
                                </div>
                            @endif
                            <div class="mt-4 text-center" style="font-size: 13px; color: #888;">
                                © 2025. <a href="https://smartmediaindonesia.com/" target="_blank">Smart Media Indonesia</a> | <a href="https://smartmediaindonesia.com/" target="_blank">Desa Manyampa</a>
                            </div>
                        </div>
                    </div>
                    <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>


        </section><!-- /Hero Section -->

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
                            <p>Jl. Poros Bantaeng - bulukumba, Pertigaan Bontomalengoo
                                {{-- {{ $profilDesa->alamat }} --}}
                            </p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Nomor Telepon</h3>
                            <p>0812-8707-0092
                                {{-- {{ $profilDesa->kontak }} --}}
                            </p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>herwanto2582@gmail.com
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
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>
