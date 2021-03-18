<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends AppModel
{
    protected $table = 'posts';
    protected $primaryKey ='id';
    protected $fillable = ['id','post_type_id','title','title_unsigned','content','image',
        'day_update','created_at', 'update_at', ];

    public function postType()
    {
        return $this->belongsTo('App\Models\PostType','post_type_id','id');
    }

    public function Comment()
    {
        return $this->hasMany('App\Models\Comment','post_id','id');
    }

    public function flagSeen()
    {
        return $this->hasMany('App\Models\Category','post_id','id');
    }
}
