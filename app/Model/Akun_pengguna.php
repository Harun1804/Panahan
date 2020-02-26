<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Akun_pengguna extends Authenticatable
{
    use Notifiable;
    protected $table = 'detail_pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['id_pengguna', 'username', 'password', 'hak_akses'];
    protected $keyType = 'string';
    public $incrementing = false;
    protected $hidden = [
        'password', 'remember_token',
    ];
}
