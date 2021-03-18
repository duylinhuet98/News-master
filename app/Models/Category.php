<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $primaryKey ='id';
    protected $fillable = ['id','name','name_unsigned','created_at', 'update_at'];
    public function postType()
    {
        return $this->hasMany('App\Models\PostType','category_id','id');
    }
}
