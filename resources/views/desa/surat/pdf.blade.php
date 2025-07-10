@if($list->kode_surat == 'sktm')
    <x-template-surat.sktm :list="$list" :user="$user"/>
@elseif($list->kode_surat == 'skk')
    <x-template-surat.skk :list="$list" :user="$user"/>
@endif
