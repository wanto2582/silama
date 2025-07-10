<x-app-layout>
    <x-slot name="title">Buat Surat Baru</x-slot>

    @if($detailSurat?->kode_surat == 'skd')
    @include('desa.edit.skd')
    @elseif($detailSurat?->kode_surat == 'sks')
    @include('desa.edit.sks')
    @elseif($detailSurat?->kode_surat == 'skk')
    @include('desa.edit.skk')
    @elseif($detailSurat?->kode_surat == 'skkk')
    @include('desa.edit.skkk')
    @elseif($detailSurat?->kode_surat == 'sktm')
    @include('desa.edit.sktm')
    @elseif($detailSurat?->kode_surat == 'sku')
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
        if (selectedValue === "skd") {
            document.getElementById("skd").style.display = "block";
        } else if (selectedValue === "skk") {
            document.getElementById("skk").style.display = "block";
        } else if (selectedValue === "sktm") {
            document.getElementById("sktm").style.display = "block";
        } else if (selectedValue === "sku") {
            document.getElementById("sku").style.display = "block";
        }
    }
</script> --}}
