<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlagSeen extends Model
{
    protected $table='flag_seen';
    protected $primaryKey ='id';
    protected $fillable = ['id','post_id','user_id','created_at', 'update_at', 'deleted_at'];
    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id','id');
    }
}
