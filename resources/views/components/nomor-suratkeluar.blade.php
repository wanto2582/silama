@php
// Set default values
$type = isset($type) ? $type : 'su';
$index = isset($index) ? $index : 1;
$prefix = isset($prefix) ? $prefix : 'DM';

$romanMonths = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
$currentMonth = \Carbon\Carbon::now()->format('n');
$currentYear = \Carbon\Carbon::now()->format('Y');
$romanMonth = $romanMonths[$currentMonth];

// Format nomor surat berdasarkan tipe
if ($type === 'su') {
$nomorSuratkeluar = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'su5') {
$nomorSuratkeluar = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'sku') {
$nomorSuratkeluar = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'spt') {
$nomorSuratkeluar = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'sktm') {
$nomorSuratkeluar = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'skk') {
$nomorSuratkeluar = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} else {
$nomorSuratkeluar = $index . '/ ' . $prefix . ' / ' . $romanMonth . ' / ' . $currentYear;
}
@endphp

<p style="text-align: center; margin-top: 0; padding: 0; margin-bottom: 20px;">
    Nomor : <span style="text-align: center; margin-top: 0; padding: 0; margin-bottom: 20px; font-style: italic;">
    {{ $type === 'su' ? ':' : '.' }} {{ $nomorSuratkeluar }}</span>
</p> 
