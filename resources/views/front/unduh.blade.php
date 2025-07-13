@if($list->kode_surat == 'sktm')
    <x-template-surat.sktm :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'skk')
    <x-template-surat.skk :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'skd')
    <x-template-surat.skd :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'sks')
    <x-template-surat.sks :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'skkk')
    <x-template-surat.skkk :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'sku')
    <x-template-surat.sku :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'skl')
    <x-template-surat.skl :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
    {{-- LAYOUTE SURAT KETERANGAN LAINYA --}}
@elseif($list->kode_surat == 'lsk')
    <x-template-surat.lsk :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
{{-- SURAT IZIN/REKOMENDASI --}}
@elseif($list->kode_surat == 'sikd')
    <x-template-surat.sikd :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
    {{-- SURAT PERNYATAAN --}}
@elseif($list->kode_surat == 'spa')
    <x-template-surat.spa :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'spb')
    <x-template-surat.spb :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>

     
@endif
