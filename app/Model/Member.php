<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
