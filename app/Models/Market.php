<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public function announcements() {
        return $this->hasMany('App\Models\Announcement');
    }
}
