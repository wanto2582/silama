@if($listkeluar->kode_surat == 'su')
    <x-template-suratkeluar.su :listkeluar="$listkeluar" :pskeluar="$pskeluar" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($listkeluar->kode_surat == 'spt')
    <x-template-suratkeluar.spt :listkeluar="$listkeluar" :pskeluar="$pskeluar" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($listkeluar->kode_surat == 'sku')
    <x-template-suratkeluar.sku :listkeluar="$listkeluar" :pskeluar="$pskeluar" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@endif
