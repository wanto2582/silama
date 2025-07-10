<x-app-layout>
    <x-slot name="title">Riwayat</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Riwayat Pengajuan</h4>
        </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Nama</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Aksi</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @if($pengajuanSurat->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            Anda belum pernah mengajukan surat apapun.
                        </div>
                    @else
                        @foreach($pengajuanSurat as $pengajuan)
                        <tr>
                            <td class="table-plus">{{$loop->iteration}}</td>
                            @foreach($pengajuan->detail_surats as $detailSurat)
                                <td>{{$detailSurat->nama}}</td>
                                <td>{{$detailSurat->jenis_surat}}</td>
                                @if ($pengajuan->status == 'Diproses')
                                    <td class="text-primary">
                                        <span class="badge badge-secondary">Proses</span>
                                    </td>
                                    <td>
                                        <i class="small">Diproses Sekdes</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Ditolak')
                                    <td class="text-danger">
                                        <span class="badge badge-danger">Ditolak</span>
                                    </td>
                                    <td>
                                        <button-sm data-toggle="modal" data-target="#passwordModal" id="openPopupBtn" class="btn-sm btn-danger"><i class="dw dw-eye"></i></button-sm>
                                    </td>
                                    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="passwordModalLabel">Keterangan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$pengajuan->keterangan}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($pengajuan->status == 'Dikonfirmasi')
                                    <td class="text-primary">
                                        <span class="badge badge-primary">Ttd</span>
                                    </td>
                                    <td>
                                        <i class="small">Menunggu Acc Kades</i>
                                    </td>
                                @elseif ($pengajuan->status == 'Selesai')
                                    <td class="text-success">
                                        <span class="badge badge-success">Selesai</span>
                                    </td>
                                    <td>
                                        <a  href="{{route('unduh.surat', $detailSurat->id)}}" ><button-sm class="btn-sm btn-success"><i class="icon-copy bi bi-download"></i></button-sm></a >
                                        {{-- <div class="dropdown" >
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown" >
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >
                                                <a class="dropdown-item" href="{{route('unduh.surat', $detailSurat->id)}}" ><i class="dw dw-download"></i> Download</a >
                                            </div>
                                        </div> --}}
                                    </td>

                                @elseif ($pengajuan->status == 'Expired')
                                <td class="text-danger">
                                    <span class="badge badge-danger">Expired</span>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Simple Datatable End -->

</x-app-layout>
