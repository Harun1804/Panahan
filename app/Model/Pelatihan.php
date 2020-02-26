<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihan';
    protected $primaryKey = 'id_pelatihan';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
