/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function( config ) {
    // ... konfigurasi lainnya ...

    // Menonaktifkan widget gambar (image2) dan tabel dengan ACF
    config.disallowedContent = 'figure; img[data-cke-widget*]; table;';
    // 'figure' untuk widget gambar, 'img[data-cke-widget*]' untuk target gambar widget
    // 'table' untuk widget tabel
    // Sesuaikan dengan tag dan atribut yang digunakan oleh widget yang ingin kamu hilangkan.

    // Pastikan ACF aktif (biasanya default)
    config.allowedContent = true; // Ini akan mengaktifkan ACF jika belum

    // ... konfigurasi lainnya ...
};