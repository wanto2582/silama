<x-app-layout>
    <x-slot name="title">Buat Surat Baru</x-slot>

    @if($detailSuratkeluar?->kode_surat == 'su')
    @include('desa.edit.su')
    @elseif($detailSuratkeluar?->kode_surat == 'spt')
    @include('desa.edit.spt')
    @elseif($detailSuratkeluar?->kode_surat == 'sku')
    @include('desa.edit.sku')
    @endif

</x-app-layout>

{{-- <script>
    function showCard(selectedValue) {
        // Semua card disembunyikan terlebih dahulu
        document.getElementById("skk").style.display = "none";
        document.getElementById("sktm").style.display = "none";
        document.getElementById("sku").style.display = "none";

        // Tampilkan card sesuai dengan nilai yang dipilih
        if (selectedValue === "su") {
            document.getElementById("su").style.display = "block";
        } else if (selectedValue === "skk") {
            document.getElementById("skk").style.display = "block";
        } else if (selectedValue === "sktm") {
            document.getElementById("sktm").style.display = "block";
        } else if (selectedValue === "sku") {
            document.getElementById("sku").style.display = "block";
        }
    }
</script> --}}
