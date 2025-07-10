<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div
            class="search-toggle-icon bi bi-search"
            data-toggle="header_search"></div>
        {{-- <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input
                        type="text"
                        class="form-control search-input"
                        placeholder="Search Here"
                    />
                    <div class="dropdown">
                        <a
                            class="dropdown-toggle no-arrow"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                        >
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label"
                                    >From</label
                                >
                                <div class="col-sm-12 col-md-10">
                                    <input
                                        class="form-control form-control-sm form-control-line"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input
                                        class="form-control form-control-sm form-control-line"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label"
                                    >Subject</label
                                >
                                <div class="col-sm-12 col-md-10">
                                    <input
                                        class="form-control form-control-sm form-control-line"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> --}}
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a
                    class="dropdown-toggle no-arrow"
                    href="javascript:;"
                    data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a
                    class="dropdown-toggle no-arrow"
                    href="#"
                    role="button"
                    data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    @if($pendingCount > 0)
                    <span class="badge notification-active">{{ $pendingCount }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <style>
                            .notification-list ul li a {
                                padding-left: 15px !important;
                            }

                            .notification-list ul li a h3 {
                                margin-left: 0 !important;
                                padding-left: 0 !important;
                            }

                            .notification-list ul li a p {
                                margin-left: 0 !important;
                                padding-left: 0 !important;
                            }

                            /* Custom notification badge styling */
                            .user-notification .dropdown-toggle {
                                position: relative;
                            }

                            .user-notification .badge.notification-active {
                                position: absolute;
                                top: -8px;
                                right: -8px;
                                background-color: #dc3545 !important;
                                color: white !important;
                                font-size: 11px !important;
                                font-weight: bold !important;
                                min-width: 18px;
                                height: 18px;
                                border-radius: 50% !important;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border: 2px solid white;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                            }
                        </style>
                        <ul>
                            @if($pendingNotifications->count() > 0)
                            @foreach($pendingNotifications as $notification)
                            @php
                            $detailSurat = $notification->detail_surats_notifikasi->first();
                            @endphp
                            <li>
                                @php
                                // Determine the route and message based on user role
                                $route = '#';
                                $message = '';

                                if (auth()->check()) {
                                $userRole = auth()->user()->roles->first()->id;

                                if ($userRole == 3) { // Staff
                                $route = route('staff.pengajuan.show', $detailSurat->id ?? '#');
                                $message = 'Pengajuan ' . ($detailSurat->jenis_surat ?? 'Surat') . ' menunggu konfirmasi';
                                } elseif ($userRole == 2) { // Kades
                                $route = route('kades.pengajuan.show', $detailSurat->id ?? '#');
                                $message = 'Pengajuan ' . ($detailSurat->jenis_surat ?? 'Surat') . ' menunggu tanda tangan';
                                }
                                }
                                @endphp
                                <a href="{{ $route }}">
                                    <h3>{{ $detailSurat->nama ?? 'Pengaju' }}</h3>
                                    <p>
                                        {{ $message }}
                                        <br><small>{{ $notification->created_at->diffForHumans() }}</small>
                                    </p>
                                </a>
                            </li>
                            @endforeach
                            @else
                            <li>
                                <a href="#">
                                    <h3>Tidak ada notifikasi</h3>
                                    <p>
                                        Semua pengajuan sudah diproses
                                    </p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @if($pendingCount > 0)
                    <div class="notification-footer">
                        @php
                        $allPengajuanRoute = '#';
                        if (auth()->check()) {
                        $userRole = auth()->user()->roles->first()->id;
                        if ($userRole == 3) { // Staff
                        $allPengajuanRoute = route('staff.pengajuan.index');
                        } elseif ($userRole == 2) { // Kades
                        $allPengajuanRoute = route('kades.pengajuan.index');
                        }
                        }
                        @endphp
                        <a href="{{ $allPengajuanRoute }}">Lihat Semua Pengajuan</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a
                    class="dropdown-toggle"
                    href="#"
                    role="button"
                    data-toggle="dropdown">
                    <span class="user-icon">
                        @if(Auth::user()->detail_users()->first())
                        <img src="{{asset('storage/'.Auth::user()->detail_users()->first()->photo)}}" alt="" />
                        @else
                        <img src="{{ asset('storage/default/profile.jpg') }}" alt="Foto Profil Default">
                        @endif
                    </span>
                    <span class="user-name">{{auth()->user()->name}}</span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    {{-- <a class="dropdown-item" href="{{route('profile.edit')}}"
                    ><i class="dw dw-user1"></i> Profile</a> --}}
                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="dw dw-settings2"></i> Setting dulu</a>
                    {{-- <a class="dropdown-item" href="faq.html"
                        ><i class="dw dw-help"></i> Help</a
                    > --}}
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item" href="{{route('logout')}}"><i class="dw dw-logout"></i> {{ __('Log Out') }} </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>