<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestionMarket extends Model
{
    protected $fillable = ['name', 'mobile', 'phone', 'address', 'note', 'status', 'user_id', 'location'];

    protected $spatialFields = [
        'location',
    ];

    function getLocationAttribute($value) {
        $response = explode(
            ' ',
            str_replace(
                [
                    "GeomFromText('",
                    "'",
                    'POINT(',
                    ')'
                ],
                '',
                $value
            )
        );

        return $response;
    }
}
