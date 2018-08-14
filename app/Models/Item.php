<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    function getImageAttribute($value) {
        if(isset($value)) {
            return url('images/items/'.$value);
        }

        return url('images/default.png');
    }
}
