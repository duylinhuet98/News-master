<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    protected $primaryKey ='id';
    protected $fillable = ['id','post_id','user_id','content','created_at', 'update_at', 'deleted_at'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id','id');
    }
}
