<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelatihan_detail extends Model
{
    protected $table = "detail_pelatihan";
    protected $primaryKey = 'id_pelatihan';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
