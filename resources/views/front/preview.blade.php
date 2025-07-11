<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>

<canvas id="pdfViewer"></canvas>

<script>
    // Path ke PDF
    const pdfPath = "{{ asset('storage/temp/bubla.pdf') }}";

    // Mengatur skala halaman PDF
    const scale = 1.5;

    // Memuat PDF
    pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
        // Mendapatkan halaman pertama
        pdf.getPage(1).then(page => {
            const canvas = document.getElementById('pdfViewer');
            const context = canvas.getContext('2d');

            // Menghitung ukuran halaman
            const viewport = page.getViewport({ scale });

            // Mengatur ukuran canvas
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render halaman PDF ke canvas
            page.render({
                canvasContext: context,
                viewport: viewport
            });
        });
    });
</script>
