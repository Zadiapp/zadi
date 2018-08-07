<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'name_ar', 'description', 'description_ar', 'image', 'status', 'created_at', 'updated_at'];

    function getImageAttribute($value) {
        if(isset($value)) {
            return url('images/categories/'.$value);
        }

        return url('images/categories/default.png');
    }
}

