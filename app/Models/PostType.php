<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table='post_type';
    protected $primaryKey ='id';
    protected $fillable = ['id','name','created_at', 'update_at', 'deleted_at'];
    public function post()
    {
        return $this->hasMany('App\Models\Post','post_type_id','id');
    }
}
