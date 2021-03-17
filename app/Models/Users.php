<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='users';

    public function flagSeen()
    {
        return $this->hasMany('App\Models\FlagSeen','user_id','id');
    }

    public function Comment()
    {
        return $this->hasMany('App\Models\Comment','user_id','id');
    }
}
