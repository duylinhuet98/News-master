<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AppModel extends Authenticatable
{
    const ROLE_USER = 1;
    const ROLE_ADMIN = 0;
    const STATUS_READ = 1;
    const STATUS_UNREAD = 1;
}
