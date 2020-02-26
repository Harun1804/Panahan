<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Detail_pembayaran extends Model
{
    protected $table = 'detail_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = [];
}
