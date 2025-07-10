<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'photo',
        'nik',
        'gender',
        'religion',
        'born_place',
        'born_date',
        'phone_number',
        'address',
        'rt',
        'rw',
        'status_perkawinan',
        'ktp',
        'status_akun',
        'pekerjaan',
        'kewarganegaraan',
    ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
