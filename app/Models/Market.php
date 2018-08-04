<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
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

    public function announcements() {
        return $this->hasMany('App\Models\Announcement');
    }
}
