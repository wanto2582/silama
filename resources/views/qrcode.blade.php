<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Qr Code</title>
    <style>
.qr-container {
    outline: 1px solid #000; /* for demonstration purposes */
    position: relative;
    display: flex;
    justify-content: center; /* aligns children horizontally (logo and QR code) */
    align-items: center; /* aligns children vertically (logo and QR code) */
    height: 300px; /* adjust the height as needed */
}

.object-a {
    position: absolute;
    top: 50%; /* Menggeser logo ke tengah vertikal */
    left: 50%; /* Menggeser logo ke tengah horizontal */
    transform: translate(-50%, -50%); /* Membuat logo berada di tengah-tengah */
}

.logo {
    position: absolute;
    top: 50%; /* Menggeser logo ke tengah vertikal */
    left: 50%; /* Menggeser logo ke tengah horizontal */
    transform: translate(-50%, -50%); /* Membuat logo berada di tengah-tengah */
    z-index: 2; /* Pastikan logo berada di lapisan terdepan */
}

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
        <div class="row">
    <div class="col">
        <p class="mb-0">Simple</p>
        <div class="qr-container">
            <img style="width: 30px" src="{{asset('logo.png')}}" class="logo" alt="">
            <div class="object-a">{!! $title !!}</div>
        </div>
    </div>


            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
