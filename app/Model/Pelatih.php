<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    protected $table = 'pelatih';
    protected $primaryKey = 'id_pelatih';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
