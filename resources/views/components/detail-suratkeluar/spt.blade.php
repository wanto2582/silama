<h2 class="h4 mb-20">Detail - {{$detailSuratkeluar->jenis_surat}}</h2>

<table>
    <tr>
        <td width="20%">Operator </td>
        <td width="1%">:</td>
        <td>- {{ $user->name }}</td>
    </tr>
    <tr>
        <td width="20%">No WA </td>
        <td width="1%">:</td>
        <td>- {{ $user->detail_users->phone_number }}
         <a href="https://wa.me/+62{{ $user->detail_users->phone_number }}?text=Halo,%20{{ $user->name }}." target="_blank">
            Chat Whatsapp
</a></td>
    </tr>
</table>
<br>
<table class="table table-bordered">
    <tr>
        <td width="30%">Dasar  Surat</td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->paragraf_1 ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tgl Surat </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nik ?? '' }}</td>
    </tr>
     <tr>
        <td width="30%">Nama (Yg ditugaskan) </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->yth ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">NIP </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->nip ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Pangkat/Golongan </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->pangkat_golongan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Jabatan </td>
        <td width="1%">:</td>
        <td>{{ $detailSuratkeluar->jabatan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Untuk </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->perihal ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tempat </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tempat ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Lama Perjalanan </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->lama_perjalanan ?? '' !!}</td>
    </tr>
     <tr>
        <td width="30%">Tgl Berangkat </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tgl_berangkat ?? '' !!}</td>
    </tr>
     <tr>
        <td width="30%">Tgl Kembali </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tgl_pulang ?? '' !!}</td>
    </tr>
    <tr>
        <td width="30%">Tembusan </td>
        <td width="1%">:</td>
        <td>{!!  $detailSuratkeluar->tembusan ?? '' !!}</td>
    </tr>
    
</table>
