<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
