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

        $location = new \stdClass();;

       if(empty($response)) {
           dd($response);
            $location->type = 'point';
            $location->coordinates = $response;
       } 
       dd($response);
        return $location;
    }

    public function announcements() {
        return $this->hasMany('App\Models\Announcement');
    }
}
