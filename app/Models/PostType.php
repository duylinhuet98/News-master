<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table='post_type';
    protected $primaryKey ='id';
    protected $fillable = ['id', 'category_id', 'name', 'name_unsigned', 'created_at', 'update_at'];
    public function post()
    {
        return $this->hasMany('App\Models\Post','post_type_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
