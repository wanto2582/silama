@php
// Set default values
$type = isset($type) ? $type : 'skd';
$index = isset($index) ? $index : 1;
$prefix = isset($prefix) ? $prefix : 'DM';

$romanMonths = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
$currentMonth = \Carbon\Carbon::now()->format('n');
$currentYear = \Carbon\Carbon::now()->format('Y');
$romanMonth = $romanMonths[$currentMonth];

// Format nomor surat berdasarkan tipe
// SURAT KETERANGAN
if ($type === 'skd') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'sks') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'sku') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'skkk') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'sktm') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'skk') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;

// SURAT PERNYATAAN
} elseif ($type === 'spa') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} elseif ($type === 'spb') {
$nomorSurat = $index . ' / DM / ' . $romanMonth . ' / ' . $currentYear;
} else {
$nomorSurat = $index . '/ ' . $prefix . ' / ' . $romanMonth . ' / ' . $currentYear;
}
@endphp

<p style="text-align: center; margin-top: 0; padding: 0; margin-bottom: 20px;">
    Nomor : <span style="text-align: center; margin-top: 0; padding: 0; margin-bottom: 20px; font-style: italic;">
    {{ $type === 'skd' ? ':' : '.' }} {{ $nomorSurat }}</span>
</p> 
