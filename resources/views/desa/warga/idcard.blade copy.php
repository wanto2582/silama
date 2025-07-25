<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Riwayat Pengajuan</h4>
        </div>
        <div class="pb-20">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- html2canvas CDN for converting HTML to image -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        /* Custom styles for the new green ID card design */
        .bg-green-gradient {
            background: linear-gradient(to right, #4CAF50, #8BC34A); /* Green gradient from the image */
        }
        .text-green-dark { color: #2E7D32; } /* Darker green for text */
        .text-green-light { color: #A5D6A7; } /* Lighter green for subtle text */
        .border-green-dark { border-color: #2E7D32; }

        /* Ensure consistent font-family for the entire document */
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        /* ID card container */
        .id-card-container {
            width: 3.5in; /* Standard business card width */
            height: 2in; /* Standard business card height */
            background-color: white;
            border-radius: 0.25rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            margin-bottom: 20px;
        }

        /* Green background overlay with shapes */
        .id-card-background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #4CAF50, #8BC34A); /* Main green gradient */
            z-index: 0;
        }

        /* Top right wave shape */
        .id-card-background-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 70%; /* Adjust width for the curve */
            height: 100%;
            background: linear-gradient(to bottom, #66BB6A, #A5D6A7); /* Lighter green gradient for the wave */
            border-bottom-left-radius: 100% 100%;
            transform: translateX(40%); /* Move it to the right */
            z-index: 1;
        }

        /* Bottom right wave shape */
        .id-card-background-overlay::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 60%; /* Adjust width for the curve */
            height: 100%;
            background: linear-gradient(to top, #66BB6A, #A5D6A7); /* Lighter green gradient for the wave */
            border-top-left-radius: 100% 100%;
            transform: translateX(50%); /* Move it to the right */
            z-index: 1;
        }

        /* Content wrapper to ensure it's above the background */
        .id-card-content-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            display: flex;
        }

        /* Left section for photo and signature */
        .left-section-new {
            width: 35%; /* Adjust width for the photo area */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            background-color: transparent; /* Background handled by overlay */
        }

        .profile-photo-large {
            width: 1.2in; /* Larger size for the main photo */
            height: 1.2in; /* Larger size for the main photo */
            border-radius: 0.25rem; /* Slightly rounded corners */
            object-fit: cover;
            border: 2px solid white; /* White border as in the image */
            box-shadow: 0 2px 4px rgba(0,0,0,0.2); /* Subtle shadow for depth */
        }

        .issue-date {
            font-size: 0.55rem;
            color: white;
            margin-top: 0.5rem;
            text-align: center;
        }

        .signature-area {
            width: 80%;
            height: 0.5in; /* Space for signature */
            border-top: 1px solid white;
            margin-top: 0.3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.5rem;
            color: white;
            font-style: italic;
        }

        /* Right section for text info and QR code */
        .right-section-new {
            width: 65%; /* Remaining width for text info */
            display: flex;
            flex-direction: column;
            padding: 0.5rem 1rem;
            text-align: left;
            background-color: white; /* White background for the text area */
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
            position: relative; /* For the logo at the top */
        }

        .business-card-logo-top {
            position: absolute;
            top: 0.5rem;
            left: 0.5rem;
            width: 1.2rem;
            height: 1.2rem;
            background-color: black;
            border-radius: 0.2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.5rem;
            color: white;
            text-transform: uppercase;
            z-index: 3; /* Ensure it's above other elements */
        }

        .business-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 0.5rem;
            position: relative;
            padding-top: 0.2rem; /* Space for logo */
        }

        .business-card-title {
            font-size: 0.8rem;
            font-weight: bold;
            color: #2E7D32; /* Darker green */
            text-transform: uppercase;
            margin-left: 1.5rem; /* Space for the logo */
        }

        .business-card-subtitle {
            font-size: 0.6rem;
            color: #555;
            margin-top: 0.1rem;
            margin-left: 1.5rem;
        }

        .main-info-area {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 0.5rem; /* Indent text slightly */
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 0.1rem;
        }

        .info-label {
            font-size: 0.65rem;
            font-weight: bold;
            color: #2E7D32; /* Darker green */
            white-space: nowrap;
            margin-right: 0.2rem;
        }

        .info-value {
            font-size: 0.65rem;
            color: #333;
            text-align: right;
            flex-grow: 1;
        }

        .info-value.name {
            font-size: 0.9rem;
            font-weight: bold;
            color: #2E7D32;
            text-transform: uppercase;
            margin-bottom: 0.2rem;
            text-align: left; /* Align name to left */
        }

        .qr-code-bottom-right {
            width: 0.7in; /* Smaller QR code */
            height: 0.7in; /* Smaller QR code */
            object-fit: contain;
            position: absolute;
            bottom: 0.5rem;
            right: 0.5rem;
        }

        /* Print specific styles for JPG conversion */
        @media print {
            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                background-color: white !important;
            }
            .id-card-container {
                box-shadow: none;
                border-radius: 0;
                overflow: visible;
            }
            .id-card-background-overlay,
            .id-card-background-overlay::before,
            .id-card-background-overlay::after {
                background-color: inherit !important;
                background: inherit !important;
            }
            .download-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div id="idCardToCapture" class="id-card-container">
        <!-- Green background overlay with shapes -->
        <div class="id-card-background-overlay"></div>

        <!-- Main content wrapper -->
        <div class="id-card-content-wrapper">
            <!-- Left section for photo and signature -->
            <div class="left-section-new">
                <img
                    src="{{ asset('storage/' . ($warga->foto_profil ?? '')) }}"
                    alt="Profile Photo"
                    class="profile-photo-large"
                    onerror="this.onerror=null;this.src='https://placehold.co/150x150/e0e0e0/000000?text=Foto';"
                />
                <p class="issue-date">Issue date :<br>{{ $warga->issue_date ?? '08/06/25' }}</p>
                <div class="signature-area">
                    <!-- Placeholder for signature image or text -->
                    <img src="{{ asset('storage/' . ($warga->signature_image ?? '')) }}"
                         alt="Signature"
                         class="h-full w-full object-contain"
                         onerror="this.onerror=null;this.src='https://placehold.co/100x40/e0e0e0/000000?text=Signature';" />
                </div>
            </div>

            <!-- Right section for text info and QR code -->
            <div class="right-section-new">
                <div class="business-card-header">
                    <div class="business-card-logo-top">LOGO</div>
                    <div>
                        <p class="business-card-title">BUSINESS CARD</p>
                        <p class="business-card-subtitle">PLACE YOUR TEXT HERE</p>
                    </div>
                </div>

                <div class="main-info-area">
                    <p class="info-value name">{{ $warga->nama ?? 'YOUR NAME' }}</p>
                    <p class="info-value">{{ $warga->jabatan ?? 'Job Position' }}</p>

                    <div class="info-row mt-2">
                        <span class="info-label">ID :</span>
                        <span class="info-value">{{ $warga->id_warga ?? '00.112.22.333' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">D.O.B :</span>
                        <span class="info-value">{{ $warga->tanggal_lahir ?? '02/06/2023' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone :</span>
                        <span class="info-value">{{ $warga->nomor_telepon ?? '(+00.123.456.789)' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email :</span>
                        <span class="info-value">{{ $warga->email ?? 'NameYour@Mail.com' }}</span>
                    </div>
                </div>

                <!-- Expire Date -->
                <p class="text-xs text-green-dark absolute top-2 right-2">
                    Expire Date :<br>{{ $warga->expire_date ?? '12/01/26' }}
                </p>

                <!-- QR Code -->
                <img
                    src="{{ asset('storage/' . ($warga->qr_code ?? '')) }}"
                    alt="QR Code"
                    class="qr-code-bottom-right"
                    onerror="this.onerror=null;this.src='https://placehold.co/70x70/000000/FFFFFF?text=QR';"
                />
            </div>
        </div>
    </div>

    <!-- Download Button -->
    <button id="downloadPngButton" class="download-button px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition duration-300 mt-4">
        Unduh ID Card (JPG)
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const downloadPngButton = document.getElementById('downloadPngButton');
            const idCardToCapture = document.getElementById('idCardToCapture');

            downloadPngButton.addEventListener('click', async () => {
                // Temporarily hide the button to avoid it being captured in the image
                downloadPngButton.style.display = 'none';

                // Use html2canvas to capture the ID card container
                html2canvas(idCardToCapture, {
                    scale: 3, // Increase scale for higher resolution image
                    logging: false, // Disable logging for cleaner console
                    useCORS: true, // Enable CORS if you are using external images (e.g., from different domain)
                    backgroundColor: null, // Transparent background if needed, or specify 'white'
                }).then(canvas => {
                    // Convert canvas to image data URL (JPG format)
                    const imageData = canvas.toDataURL('image/jpeg', 0.9); // 0.9 is quality (0-1)

                    // Create a temporary link element
                    const link = document.createElement('a');
                    link.href = imageData;
                    link.download = 'id_card_{{ $warga->id_warga ?? 'default' }}.jpg'; // Dynamic filename

                    // Append to body and trigger click
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Show the button again
                    downloadPngButton.style.display = 'block';
                }).catch(error => {
                    console.error('Error capturing ID card:', error);
                    alert('Gagal mengunduh ID Card. Silakan coba lagi.'); // Use custom message box in a real app
                    // Show the button again in case of error
                    downloadPngButton.style.display = 'block';
                });
            });
        });
    </script>
</div>
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div>  --}}
</x-app-layout>