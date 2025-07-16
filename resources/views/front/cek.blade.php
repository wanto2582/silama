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
                    <h1 data-aos="fade-up">Cek <span>Dokumen</span></h1>
                    {{-- <p data-aos="fade-up" data-aos-delay="100">Ajukan permohonan surat dari mana saja<br> --}}
                    </p>

                    @php
                    \Carbon\Carbon::setLocale('id');
                    @endphp

                    <div class="container text-center">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card-box pd-30 height-100-p">
                                    @if($ps)
                                    @if($ps->status == 'Selesai')

                                    Bahwa benar dokumen ini terdapat dalam arsip desa Manyampa, Kecamatan Ujung Loe, Kabupaten Bulukumba, Sulawesi Selatan
                                    <br>
                                    {{-- {{ \Carbon\Carbon::parse($ps->updated_at)->translatedFormat('j F Y \p\u\k\u\l H:i') }} --}}
                                    <br>Dengan data sebagai berikut:
                                    <br>
                                    <hr>
                                    Nama : <strong>{{ $list->nama }}</strong> <br>
                                    NIK : <strong>{{ $list->nik }}</strong> <br>
                                    Jenis Surat : <strong>{{ $list->jenis_surat }}</strong> <br>
                                    <br>
                                    Dipergunakan untuk : <strong>{{ $list->tujuan }}</strong> <br>

                                    <!-- Tombol Preview Dokumen PDF -->

                                    <!-- Preview Dokumen PDF di halaman -->

                                    <hr class="mb-30 mt-30">
                                    <h2 class="mb-30 h4">Tanda Tangan Valid ✅</h2>
                                    <b p style="color: blue;"> Dibuat </b>Pada : <br>{{ \Carbon\Carbon::parse($ps->created_at)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }} <br>
                                    <b p style="color: red;"> Kadaluarsa </b>Pada : <br> {{ \Carbon\Carbon::parse($ps->created_at)->copy()->addMonths(1)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }}
                                    @elseif($ps->status == 'Expired')
                                    <h2 class="mb-30 h4">Dokumen dan Tanda Tangan <b p style="color: red;">Expired</b> ❌</h2>
                                    Tanda tangan dan dokument ini telah kadaluarsa pada :
                                    {{ \Carbon\Carbon::parse($ps->created_at)->copy()->addMonths(1)->translatedFormat('l, j F Y \p\u\k\u\l H:i') }}
                                    <br><b p style="color: red;">Dan Dokument ini tidak dapat dipergunakan lagi</b>
                                    @else
                                    <h2 class="mb-30 h4">Status Tidak Diketahui ❓</h2>
                                    Status dokumen dan tanda tangan tidak dapat diidentifikasi.
                                    @endif
                                    @else
                                    <h2 class="h4">Data Tidak Ditemukan ❌</h2>
                                    @endif

                                    <div class="mb-3 mt-3">
                                        <button class="btn btn-primary" type="button" onclick="document.getElementById('pdf-preview').style.display = (document.getElementById('pdf-preview').style.display === 'none' ? 'block' : 'none')">
                                            <i class="bi bi-eye"></i> Preview Dokumen
                                        </button>
                                    </div>

                                    <div id="pdf-preview" style="display: none; margin-bottom: 20px;">
                                        <iframe src="data:application/pdf;base64,{{ $pdfContent }}" width="100%" height="600px" frameborder="0" style="border:1px solid #ccc;"></iframe>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
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
