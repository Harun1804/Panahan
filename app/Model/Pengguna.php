<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'akun_pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['id_pengguna', 'username', 'password', 'hak_akses'];
    protected $keyType = 'string';
    public $incrementing = false;
}
