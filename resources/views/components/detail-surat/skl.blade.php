<h2 class="h4 mb-20">Detail - {{$detailSurat->jenis_surat}}</h2>

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
        <td width="30%">Nama anak </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">NIK </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat, Tanggal Lahir </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_tempat_lahir .', '. \Carbon\Carbon::parse($detailSurat->anak_tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Jenis Kelamin anak </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_gender ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Anak ke ( format tulisan )</td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_ke ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Anak ke ( format angka ) </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->anak_ke_angka ?? '' }}</td>
    </tr>
   
    <tr>
        <td width="30%">Alamat anak </td>
        <td width="1%">:</td>
        <td>{{$detailSurat->anak_alamat ?? ''}}</td>
    </tr>
    
</table>
<p>Data orang tua :</p>
<table class="table table-bordered">
    <tr>
        <td width="30%">Nama ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Nik ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat lahir ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_tempat_lahir ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tanggal lahir ibu </td>
        <td width="1%">:</td>
        <td>{{ \Carbon\Carbon::parse($detailSurat->ibu_tanggal_lahir)->isoFormat('D MMMM YYYY') ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat ibu </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ibu_alamat ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Nama ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_nama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Nik ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_nik ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tempat lahir ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_tempat_lahir ?? '' }}</td>
    </tr>
     <tr>
        <td width="30%">Tanggal lahir ayah </td>
        <td width="1%">:</td>
        <td>{{ \Carbon\Carbon::parse($detailSurat->ayah_tanggal_lahir)->isoFormat('D MMMM YYYY') ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat ayah </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->ayah_alamat ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tujuan </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->tujuan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Berkas syarat </td>
        <td width="1%">:</td>
        <td><a href="{{ route('staff.pengajuan.berkas', ['id' => $detailSurat->id]) }}"><x-button.primary-button>Unduh Berkas</x-button.primary-button></a></td>
    </tr>
</table>
