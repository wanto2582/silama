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
        <td width="30%">Nama Pengaju </td>
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
        <td>{{ $detailSurat->tempat_lahir .', '. \Carbon\Carbon::parse($detailSurat->tanggal_lahir)->isoFormat('D MMMM YYYY') ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Jenis Kelamin </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->gender ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Agama </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->agama ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Warganegara </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->kewarganegaraan ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Alamat </td>
        <td width="1%">:</td>
        <td>{{'Dusun '. $detailSurat->dusun .', RT.'. $detailSurat->rt .', RW.'. $detailSurat->rw ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Keperluan </td>
        <td width="1%">:</td>
        <td>{{$detailSurat->tujuan ?? ''}}</td>
    </tr>
    <tr>
        <td width="30%">Berkas </td>
        <td width="1%">:</td>
        <td><a href="{{ route('staff.pengajuan.berkas', ['id' => $detailSurat->id]) }}"><x-button.primary-button>Unduh Berkas</x-button.primary-button></a></td>
    </tr>
</table>
<p>Data Usaha :</p>
<table class="table table-bordered">
    <tr>
        <td width="30%">Merk / Type </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->merk_type ?? '' }}</td>
    </tr>
    <tr>
        <td width="30%">Tahun Pembuatan </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->tahun_pembuatan}}</td>
    </tr>
    <tr>
        <td width="30%">Warna </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->warna}}</td>
    </tr>
    <tr>
        <td width="30%">Nomor Rangka </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nomor_rangka}}</td>
    </tr>
    <tr>
        <td width="30%">Nomor Mesin </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nomor_mesin}}</td>
    </tr>
    <tr>
        <td width="30%">Nomor Polisi </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nomor_polisi}}</td>
    </tr>
    <tr>
        <td width="30%">Nomor BPKB </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->nomor_bpkb}}</td>
    </tr>
    <tr>
        <td width="30%">Atas Nama </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->atas_nama}}</td>
    </tr>
    <tr>
        <td width="30%">Tujuan </td>
        <td width="1%">:</td>
        <td>{{ $detailSurat->tujuan}}</td>
    </tr>
</table>
