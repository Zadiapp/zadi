<?php

namespace App\Services;

class MarketService{

    public function nearBy($lat, $lng) {
        $config = \App\Models\AppConfig::select('distance')->first(); 
        $markets = \DB::table('markets')->select(
            \DB::raw('id, name, email, opening_hour, mobile, phone, address, delivery_speed, accuracy, min_charge, logo, (
                6371 * acos (
                cos ( radians('.$lat.') )
                * cos( radians( ST_X(location) ) )
                * cos( radians( ST_Y(location) ) - radians('.$lng.') )
                + sin ( radians('.$lat.') )
                * sin( radians( ST_X(location) ) )
              )
          ) AS distance')
        )->having('distance', '<', $config->distance)->orderBy('distance')->get();

        return $markets;
    }
}
