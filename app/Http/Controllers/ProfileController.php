<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailUserRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $userRequest, DetailUserRequest $detailUserRequest): RedirectResponse
    {
        $dataUser = $userRequest->all();
        $dataDetailUser = $detailUserRequest->all();

        $get_photo = DetailUser::where('users_id', Auth::user()->id)->first();

        //delete old file from storage
        if(isset($dataDetailUser['photo'])){
            $data = 'storage/'.$get_photo['photo'];
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/'.$get_photo['photo']);
            }
        }

        if(isset($dataDetailUser['ktp'])){
            $data = 'storage/'.$get_photo['ktp'];
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/'.$get_photo['ktp']);
            }
        }

        //store file to storage
        if(isset($dataDetailUser['photo'])){
            $dataDetailUser['photo'] = $detailUserRequest->file('photo')->store('assets/photo', 'public');
        }
        if(isset($dataDetailUser['ktp'])){
            $dataDetailUser['ktp'] = $detailUserRequest->file('ktp')->store('assets/ktp', 'public');
        }

        $user = User::findOrFail(Auth::user()->id);
        // $user->assignRole($detailUserRequest->role);

                // Perbarui peran pengguna jika diminta dalam request
        if ($detailUserRequest->has('role')) {
            $role = Role::where('name', $detailUserRequest->role)->first();
            if ($role) {
                $user->syncRoles([$role->id]);
            }
        }
        $user->update($dataUser);

        $detailUser = DetailUser::where('users_id', Auth::user()->id)->firstOrFail();
        $detailUser->update($dataDetailUser);

        Alert::success('Success', 'Profile updated successfully!');
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
