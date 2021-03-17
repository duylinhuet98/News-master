<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey ='id';
    protected $fillable = ['id','title','content','image','status',
        'day_update','created_at', 'update_at', 'deleted_at'];
}

