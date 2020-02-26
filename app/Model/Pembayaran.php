<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
