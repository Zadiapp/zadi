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

        $location = new \stdClass();
       
        if(!empty($response)) {
             $location->latitude = $response[0];
             $location->longitude = $response[1];
        } 
        
        return $location;
    }

    public function announcements() {
        return $this->hasMany('App\Models\Announcement');
    }
}
