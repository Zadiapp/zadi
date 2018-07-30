<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = ['text', 'status', 'market_id', 'created_at', 'updated_at'];
}
