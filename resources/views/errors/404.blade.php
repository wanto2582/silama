<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ups! Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Menggunakan font Inter dari Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Animasi untuk ikon */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        .animate-shake {
            animation: shake 0.8s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-black-500 to-yellow-600 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl text-center max-w-lg w-full transform hover:scale-105 transition-transform duration-300 ease-in-out">
        <!-- Ikon yang lebih menarik tanpa menampilkan '404' -->
        <div class="mb-6">
            <svg class="w-24 h-24 mx-auto text-red-500 animate-shake" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2A9 9 0 111 12a9 9 0 0118 0z"></path>
            </svg>
        </div>

        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 leading-tight">
            Ups! Sepertinya Anda Tersesat.
        </h2>
        <p class="text-gray-600 text-lg md:text-xl mb-8">
            Kami tidak dapat menemukan halaman yang Anda cari.
            Mungkin tautannya rusak, atau halaman tersebut telah dipindahkan.
            Jangan khawatir, mari kembali ke jalan yang benar!
        </p>
        <a href="{{ url('/') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
