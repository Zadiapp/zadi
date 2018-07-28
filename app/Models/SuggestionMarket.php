<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestionMarket extends Model
{
    protected $fillable = ['name', 'mobile', 'phone', 'address', 'note', 'status', 'user_id'];
}
