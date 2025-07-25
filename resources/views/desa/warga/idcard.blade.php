<x-app-layout>
    <x-slot name="title">IdCard Warga</x-slot>
    <div class="pd-20 card-box mb-10 shadow-lg rounded-lg border-primary">
        <div class="clearfix border-bottom pb-3 mb-4 d-flex align-items-center">
            <i class="icon-copy dw dw-file-1 mr-3 text-blue" style="font-size: 2.5rem;"></i>
            <div class="flex-grow-1">
                <h4 class="text-blue h6 mb-1">ID Card Profil Warga</h4>
                    <p class="mb-0 text-muted">Qr Code Menjukan Alamat Tinggal Yang bersangkutan</p>
            </div>
             </div>

{{-- </head>
<body> --}}
    <div id="idCardToCapture" class="id-card-container">
        <!-- Green background overlay with shapes -->
        <div class="id-card-background-overlay"></div>

        <!-- Main content wrapper -->
        <div class="id-card-content-wrapper">
            <!-- Left section for photo and signature -->
            <div class="left-section-new">
                <img src="{{ asset('src/images/photo8.jpg') }}" alt="Foto Warga" class="foto-img" style="width: 100px; height: 100px;" onerror="this.onerror=null;this.src='src/images/photo4.jpg';"/>
                <p class="issue-date">NIK :<br>{{ old('nik', $dataWarga->nik ?? '') }}</p>
                <div class="signature-area">
                    <!-- Placeholder for signature image or text -->
                <p class="issue-date" style="margin-top: -15px; font-weight: bold; font-size: 10px;">
                    {{ old('pekerjaan', $dataWarga->pekerjaan ?? '') }}</p>

                </div>
            </div>

            <!-- Right section for text info and QR code -->
            <div class="right-section-new">
                <div class="business-card-header">
                    <div class="business-card-logo-top" style="margin-left: -18px; margin-top: -5px;">
                        <img src="{{ asset('src/images/logo.png') }}" alt="Logo" class="logo-img" />
                    </div>
                    <div style="margin-left: -8px; margin-top: -10px;">
                         {{-- <p class="business-card-subtitle">Desa</p> --}}
                        <p class="business-card-title" style="margin-top: 0px; font-weight: bold; font-size: 11px;">Desa Manyampa</p>
                         <p class="business-card-subtitle" style="margin-left: 24px; margin-top: -1px; font-weight: bold; font-size: 8px;">Ujung Loe, Bulukumba, Sulawesi Selatan</p>
                    </div>
                </div>

                <div class="main-info-area">
                    <p class="info-value name"  style="margin-left: -15px; margin-top: 10px; margin-bottom: -10px; font-color: rgb(255, 255, 255); font-weight: bold; font-size: 14px;">
                        {{ old('nama', $dataWarga->nama ?? '') }}</p>
                    {{-- <p class="info-value" style="margin-left: px; text-align: left;">
                        {{ old('pekerjaan', $dataWarga->pekerjaan ?? '') }}</p> --}}

                    <div class="info-row mt-1" style="margin-top: -15px;">
                        <span class="info-label" style="margin-left: -15px;">Dusun :</span>
                        <span class="info-value" style="margin-left: px; text-align: left;">
                            {{ old('dusun', $dataWarga->dusun ?? '') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label" style="margin-left: -15px;">Rt / Rw :</span>
                        <span class="info-value" style="margin-left: px; text-align: left;">
                            {{ old('rt', $dataWarga->rt ?? '') }} / {{ old('rw', $dataWarga->rw ?? '') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label" style="margin-left: -15px;">No Rumah :</span>
                        <span class="info-value" style="margin-left: px; text-align: left;">
                            {{ old('no_rumah', $dataWarga->no_rumah ?? '') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label" style="margin-left: -15px;">Phone :</span>
                        <span class="info-value" style="margin-bottom: 10px; text-align: left;">
                            {{ old('no_tlp', $dataWarga->no_tlp ?? '') }}</span>
                    </div>
                    {{-- <div class="info-row">
                        <span class="info-label" style="margin-left: -15px;">Email :</span>
                        <span class="info-value" style="margin-bottom: 10px; text-align: left;">
                            {{ old('email', $dataWarga->email ?? '') }}</span>
                    </div> --}}
                </div>

                <!-- Expire Date -->
                {{-- <p class="text-xs text-green-dark absolute top-2 right-4" style="margin-top: -5px;" ><em style="font-size: 10px;"> 
                    No. Rumah :</em><br><b style="font-size: 12px; text-align: right; margin-left:20px;">
                        {{ old('no_rumah', $dataWarga->no_rumah ?? '') }}</b>
                </p> --}}

                <!-- QR Code -->
                <img
                    src="{{ asset('src/images/qrcode.png') }}"
                    alt="QR Code"
                    class="qr-code-bottom-right"
                    onerror="this.onerror=null;this.src='{{ asset('src/images/qrcode.png') }}';"
                />
            </div>
        </div>
    </div>
   
    <div>
    <button id="downloadPngButton" class="download-button px-6 py-3 bg-green-600 text-#ff950bff font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition duration-300 mt-4">
        Download ID Card
    </button>
</div>
<br>
    </div>
    </div>
    </div>
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- html2canvas CDN for converting HTML to image -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        /* Custom styles for the new green ID card design */
        .bg-green-gradient {
            background: linear-gradient(to right, rgb(44, 41, 41), #252524); /* Green gradient from the image */
        }
        .text-green-dark { color: rgb(27, 26, 26); } /* Darker green for text */
        .text-green-light { color: #A5D6A7; } /* Lighter green for subtle text */
        .border-green-dark { border-color: rgb(0, 0, 0); }

       
        /* ID card container */
        .id-card-container {
            width: 3.5in; /* Standard business card width */
            height: 2in; /* Standard business card height */
            background-color: #ff950bff;
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
            background: linear-gradient(to right, rgb(44, 41, 41), #252524); /* Main green gradient */
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
            border: 2px solid #ff950bff; /* White border as in the image */
            box-shadow: 0 2px 4px rgba(0,0,0,0.2); /* Subtle shadow for depth */
        }

        .issue-date {
            font-size: 0.55rem;
            color: rgb(255, 255, 255);
            margin-top: 0.5rem;
            text-align: center;
        }

        .signature-area {
            width: 80%;
            height: 0.5in; /* Space for signature */
            border-top: 1px solid #ff950bff;
            margin-top: 0.3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.5rem;
            color: #ff950bff;
            font-style: italic;
        }

        /* Right section for text info and QR code */
        .right-section-new {
            width: 65%; /* Remaining width for text info */
            display: flex;
            flex-direction: column;
            padding: 0.5rem 1rem;
            text-align: left;
            background-color: #ff950bff; /* White background for the text area */
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
            background-color: #ff950bff;
            border-radius: 0.2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.5rem;
            color: #ff950bff;
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
            color: rgb(0, 0, 0); /* Darker green */
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
            color: rgb(0, 0, 0); /* Darker green */
            #ff950bff-space: nowrap;
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
            color: rgb(255, 255, 255);
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
                background-color: #ff950bff !important;
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
                    backgroundColor: null, // Transparent background if needed, or specify '#ff950bff'
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

</x-app-layout>