<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['device_id', 'token', 'language', 'user_id', 'created_at', 'updated_at'];
}
