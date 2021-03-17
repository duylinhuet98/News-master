<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table='slide';
    protected $primaryKey ='id';
    protected $fillable = ['id','name','image','content',
        'link','created_at', 'update_at', 'deleted_at'];
}
