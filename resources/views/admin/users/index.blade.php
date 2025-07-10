Pa<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">All user</h2>
        </div>
        <div class="card-box pb-10 mb-20">
            <div class="h5 pd-20 mb-0">
                <x-button.primary-button class="btn btn-primary"><a href="{{ route('admin.users.create') }}" style="text-decoration: none; color:white;"> Add User </a></x-button.primary-button>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="datatable-nosort">Actions</th>
                        <th class="datatable-nosort"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="avatar mr-2 flex-shrink-0">
                                    @if($user->detail_users && $user->detail_users()->first()->photo != null)
                                    <img src="{{asset('storage/'.$user->detail_users()->first()->photo)}}" class="border-radius-100 shadow" width="40" height="40" alt="" />
                                    @else
                                    <img src="{{ asset('storage/default/profile.jpg') }}" class="border-radius-100 shadow" width="40" height="40" alt="Foto Profil Default">
                                    @endif
                                </div>
                                <div class="txt">
                                    <div class="weight-600">{{$user->name}}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>
                            <span
                                class="badge badge-pill"
                                data-bgcolor="#e7ebf5"
                                data-color="#265ed7">{{ $user->roles->pluck('name')->implode(', ') }}</span>
                        </td>
                        {{-- <td>
                                    <div class="table-actions">
                                        <a href="{{route('admin.users.edit', $user->id)}}" data-color="#265ed7"
                        ><i class="icon-copy dw dw-edit2"></i></a>
                        <form id="deleteForm-{{ $user->id }}" action="{{route('admin.users.destroy', $user->id)}}" method="post" class="mt-6">
                            @csrf
                            @method('DELETE')
                            <button style="display: none;" type="submit"></button>
                            <a href="#" style="border: none; background: none; cursor: pointer; text-decoration: none; padding: 0; margin: 0;" onclick="event.preventDefault(); document.getElementById('deleteForm-{{ $user->id }}').submit();">
                                <i class="icon-copy dw dw-delete-3"></i>
                            </a>
                        </form>
        </div>
        </td> --}}
        <td style="">
            <div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" style="">
                    {{-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> --}}
                    <a href="{{route('admin.users.edit', $user->id)}}" class="dropdown-item"><i class="dw dw-edit2"></i> Edit</a>
                    <form id="deleteForm-{{ $user->id }}" action="{{route('admin.users.destroy', $user->id)}}" method="post" class="mt-6">
                        @csrf
                        @method('DELETE')
                        <button style="display: none;" type="submit"></button>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('deleteForm-{{ $user->id }}').submit();""><i class=" dw dw-delete-3"></i> Delete</a>
                    </form>
                </div>
            </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
</x-app-layout>
