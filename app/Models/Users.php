<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='users';
    protected $primaryKey ='id';
    protected $fillable = ['id','name','email','level','status',
        'password','created_at', 'update_at', 'deleted_at'];

    public function flagSeen()
    {
        return $this->hasMany('App\Models\Category','user_id','id');
    }

    public function Comment()
    {
        return $this->hasMany('App\Models\Comment','user_id','id');
    }
}
