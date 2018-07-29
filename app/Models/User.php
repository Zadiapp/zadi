<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'mobile', 'email', 'password', 'latitude', 'longitude', 'created_at', 'updated_at'];

    public function devices() {
        return $this->hasMany('App\Models\Device');
    }
    
    public function suggestionMarkets() {
        return $this->hasMany('App\Models\SuggestionMarket');
    }
}

