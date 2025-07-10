<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');
        DetailUser::create([
            'users_id' => $admin->id,
            'status_akun' => 'Disetujui',
        ]);

        $kades = User::create([
            'name' => 'Kades',
            'email' => 'kades@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('kades');
        DetailUser::create([
            'users_id' => $kades->id,
            'status_akun' => 'Disetujui',
        ]);

        $staff = User::create([
            'name' => 'Staff',
            'email' => 'staff@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('staff');
        DetailUser::create([
            'users_id' => $staff->id,
            'status_akun' => 'Disetujui',
        ]);

        $desa = User::create([
            'name' => 'Desa',
            'email' => 'desa@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('desa');
        DetailUser::create([
            'users_id' => $desa->id,
            'status_akun' => 'Pending',
        ]);
    }
}
