@if($list->kode_surat == 'sktm')
    <x-template-suratkeluar.sktm :list="$list" :user="$user"/>
@elseif($list->kode_surat == 'skk')
    <x-template-suratkeluar.skk :list="$list" :user="$user"/>
@elseif($list->kode_surat == 'su')
    <x-template-suratkeluar.su :list="$list" :user="$user"/>
@elseif($list->kode_surat == 'spt')
    <x-template-suratkeluar.spt :list="$list" :user="$user"/>
@endif
