<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use App\Models\DetailUser;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.form', [
            'user' => new User(),
            'metapage' => [
                'title' => 'Buat User Baru',
                'url' => route('admin.users.store'),
                'method' => 'POST',
                'button' => 'Create'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $userRequest, DetailUserRequest $detailUserRequest)
    {
        $user = User::create([
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'password' => bcrypt($userRequest->password),
        ]);
        // dd($user);

        $detailuser = DetailUser::create([
            'users_id' => $user->id,
            'photo' => $detailUserRequest->file('photo')->store('assets/photo', 'public'),
            'nik' => $detailUserRequest->nik,
            'gender' => $detailUserRequest->gender,
            'religion' => $detailUserRequest->religion,
            'born_place' => $detailUserRequest->born_place,
            'born_date' => $detailUserRequest->born_date,
            'phone_number' => $detailUserRequest->phone_number,
            'address' => $detailUserRequest->address,
        ]);

        $user->assignRole($detailUserRequest->role);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.form', [
            'user' => $user,
            'metapage' => [
                'title' => 'Edit',
                'url' => route('admin.users.update', $user->id),
                'method' => 'PUT',
                'button' => 'Update'
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $userRequest, DetailUserRequest $detailUserRequest, string $id)
    {
        $dataUser = $userRequest->all();
        $dataDetailUser = $detailUserRequest->all();

        $get_photo = DetailUser::where('users_id', $id)->first();

        //delete old file from storage
        if (isset($dataDetailUser['photo'])) {
            $data = 'storage/' . $get_photo['photo'];
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $get_photo['photo']);
            }
        }

        //store file to storage
        if (isset($dataDetailUser['photo'])) {
            $dataDetailUser['photo'] = $detailUserRequest->file('photo')->store('assets/photo', 'public');
        }

        $user = User::findOrFail($id);
        // $user->assignRole($detailUserRequest->role);

        // Perbarui peran pengguna jika diminta dalam request
        if ($detailUserRequest->has('role')) {
            $role = Role::where('name', $detailUserRequest->role)->first();
            if ($role) {
                $user->syncRoles([$role->id]);
            }
        }
        $user->update($dataUser);

        $detailUser = DetailUser::where('users_id', $id)->firstOrFail();
        $detailUser->update($dataDetailUser);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // Assuming User is your model class
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    /**
     * Get the users with empty/null status_akun.
     */
    public function baru()
    {
        $detailusers = DetailUser::where('status_akun', 'Pending')->pluck('id');
        $users = User::whereIn('id', $detailusers)->get();
        return view('desa.baru.index', compact('users', 'detailusers'));
    }

    public function baru_detail(String $id)
    {
        $user = User::findOrFail($id);
        $detailuser = DetailUser::where('users_id', $id)->first();
        return view('desa.baru.detail', compact('user', 'detailuser'));
    }

    public function baru_konfirmasi(String $id)
    {
        $detailUser = DetailUser::findOrFail($id);
        $detailUser->update(['status_akun' => 'Disetujui']);

        Alert::success('Berhasil', 'Pengguna berhasil disetujui');
        return redirect()->route('pengguna-baru');
    }

    public function baru_tolak(String $id)
    {
        $detailUser = DetailUser::findOrFail($id);
        $detailUser->update(['status_akun' => 'Ditolak']);

        Alert::success('Berhasil', 'Pengguna berhasil ditolak');
        return redirect()->route('pengguna-baru');
    }
}
