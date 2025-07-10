<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function detail_users(){
        return $this->hasOne('App\Models\DetailUser', 'users_id');
    }
    public function detail_surats(){
        return $this->hasMany('App\Models\Surat\DetailSurat', 'users_id');
    }
    public function pengajuan_surats(){
        return $this->hasMany('App\Models\Surat\PengajuanSurat', 'users_id');
    }
     public function detail_suratkeluars(){
        return $this->hasMany('App\Models\Suratkeluar\DetailSuratkeluar', 'users_id');
    }
    public function pengajuan_suratkeluars(){
        return $this->hasMany('App\Models\Suratkeluar\PengajuanSuratkeluar', 'users_id');
    }
}
