<?php

if (!function_exists('toRomanMonth')) {
    /**
     * Convert month number to Roman numeral
     * 
     * @param int|null $month Month number (1-12), if null uses current month
     * @return string Roman numeral representation
     */
    function toRomanMonth($month = null)
    {
        $romanMonths = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $monthNumber = $month ?: \Carbon\Carbon::now()->format('n');
        return $romanMonths[$monthNumber] ?? '';
    }
}

if (!function_exists('getCurrentYear')) {
    /**
     * Get current year
     * 
     * @return string Current year
     */
    function getCurrentYear()
    {
        return \Carbon\Carbon::now()->format('Y');
    }
}

if (!function_exists('formatNomorSurat')) {
    /**
     * Format nomor surat with Roman month and current year
     * 
     * @param int $index Surat index
     * @param string $prefix Surat prefix (e.g., 'DM', '563', etc.)
     * @param string $suffix Optional suffix for nomor surat
     * @return string Formatted nomor surat
     */
    function formatNomorSurat($index, $prefix, $suffix = null)
    {
        $romanMonth = toRomanMonth();
        $currentYear = getCurrentYear();
        
        if ($suffix) {
            return "{$prefix}/{$index}/{$suffix}/{$currentYear}";
        } else {
            return "{$index}/ {$prefix} / {$romanMonth} / {$currentYear}";
        }
    }
}
