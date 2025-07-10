<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('vendors/images/banner-img.png')}}" alt="" />
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Halo,
                        <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}</div>
                    </h4>
                    <p class="font-18 max-width-600">
                        Selamat datang! Mudahkan urusan administrasi desa Anda di sini.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><i class="bi bi-envelope-paper" style="font-size: 50px;"></i> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">6</div>
                            <div class="weight-600 font-14">Layanan Surat</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div>
                                <a href="{{route('staff.pengajuan.index')}}">
                                <i class="icon-copy bi bi-envelope-plus" style="font-size: 50px;" ></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{count($ps->where('status', 'Diproses'))}}</div>
                            <div class="weight-600 font-14">Surat belum dikonfirmasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div>
                                <a href="{{route('staff.pengajuan.list')}}">
                                <i class="icon-copy bi bi-envelope-dash" style="font-size: 50px;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{count($ps->whereIn('status', ['Dikonfirmasi', 'Selesai']))}}</div>
                            <div class="weight-600 font-14">Surat sudah dikonfirmasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                            <div>
                            <a href="{{route('staff.pengajuan.reject')}}">
                            <i class="icon-copy bi bi-envelope-dash" style="font-size: 50px;"></i>
                            </a>
                            </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{count($ps->whereIn('status', ['Ditolak']))}}</div>
                            <div class="weight-600 font-14">Surat ditolak</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><i class="bi bi-envelope-paper" style="font-size: 50px;"></i> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">6</div>
                            <div class="weight-600 font-14">Surat Keluar</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div>
                                <a href="{{route('staff.pengajuankeluar.index')}}">
                                <i class="icon-copy bi bi-envelope-plus" style="font-size: 50px;" ></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-data">
                            {{-- <div class="h4 mb-0">{{count($pskeluar->where('status', 'Diproses'))}}</div> --}}
                            <div class="weight-600 font-14">Surat belum dikonfirmasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div>
                                <a href="{{route('staff.pengajuankeluar.listkeluar')}}">
                                <i class="icon-copy bi bi-envelope-dash" style="font-size: 50px;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-data">
                            {{-- <div class="h4 mb-0">{{count($pskeluar->whereIn('status', ['Dikonfirmasi', 'Selesai']))}}</div> --}}
                            <div class="weight-600 font-14">Surat sudah dikonfirmasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                            <div>
                            <a href="{{route('staff.pengajuankeluar.rejectkeluar')}}">
                            <i class="icon-copy bi bi-envelope-dash" style="font-size: 50px;"></i>
                            </a>
                            </div>
                        <div class="widget-data">
                            {{-- <div class="h4 mb-0">{{count($pskeluar->whereIn('status', ['Ditolak']))}}</div> --}}
                            <div class="weight-600 font-14">Surat ditolak</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</x-app-layout>
