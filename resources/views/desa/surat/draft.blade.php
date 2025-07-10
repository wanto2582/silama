<x-app-layout>
    <x-slot name="title">Draft</x-slot>
    <!-- Simple Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Draft</h4>
            <p class="mb-0">
                surat yang belum dikirim
            </p>
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
                        Tidak ada draft.
                    </div>
                    @else
                    @foreach($pengajuanSurat as $pengajuan)
                    <tr>
                        <td class="table-plus">{{$loop->iteration}}</td>
                        @foreach($pengajuan->detail_surats as $detailSurat)
                        <td>{{$detailSurat->nama}}</td>
                        <td>{{$detailSurat->jenis_surat}}</td>
                        <td class="text-warning">{{$pengajuan->status}}</td>
                        <td>
                            <div class="dropdown">
                                <a
                                    class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <form id="sendForm-{{ $pengajuan->id }}" action="{{route('desa.surat.send', $pengajuan->id)}}" method="post">
                                        @csrf
                                        <button style="display: none;" type="submit"></button>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('sendForm-{{ $pengajuan->id }}').submit();"><i class="dw dw-paper-plane"></i> Kirim</a>
                                    </form>
                                    <a class="dropdown-item" href="{{route('desa.surat.edit', $detailSurat->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                    <form id="deleteForm-{{ $pengajuan->id }}" action="{{route('desa.surat.destroy', $pengajuan->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="display: none;" type="submit"></button>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('deleteForm-{{ $pengajuan->id }}').submit();""><i class=" dw dw-delete-3"></i> Hapus</a>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- Simple Datatable End -->

</x-app-layout>
