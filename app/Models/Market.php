<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $spatialFields = [
        'location',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function announcements() {
        return $this->hasMany('App\Models\Announcement');
    }

    public function paymentMethods() {
        return $this->hasMany('App\Models\PaymentMethod');
    }

    function getPaymentMethodIdAttribute($value) {
        if(isset(\Config::get('constants.paymentMethods')[$value])) {
           return \Config::get('constants.paymentMethods')[$value];
        }
   
        return NULL;
    }

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
}
