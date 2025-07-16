@if($listkeluar->kode_surat == 'su')
    <x-template-suratkeluar.su :listkeluar="$listkeluar" :user="$user"/>
@elseif($listkeluar->kode_surat == 'su5')
    <x-template-suratkeluar.su :listkeluar="$listkeluar" :user="$user"/>
@elseif($listkeluar->kode_surat == 'spt')
    <x-template-suratkeluar.spt :listkeluar="$listkeluar" :user="$user"/>
@endif
