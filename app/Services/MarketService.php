<?php

namespace App\Services;

class MarketService{

    public function nearBy($lat, $lng) {
        $config = \App\Models\AppConfig::select('distance')->first(); 
        $markets = \DB::table('markets')->select(
            \DB::raw('id, name, email, opening_hour, mobile, phone,
                address, ST_X(location) AS latitude,  ST_Y(location) AS longitude,
                delivery_speed, accuracy, min_charge, 
                IF(logo IS NULL, "'.url('images/markets/default.jpg').'", CONCAT("'.url('/').'", logo)) as logo , (
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

    public function createSuggestionMarket($suggestMarket, $userId) {
        $suggestMarket['user_id'] = $userId;
        $suggestMarket['status'] = \Config::get('constants.suggestionMarketsStatus.underInvestigation');
        
        if(isset($suggestMarket['latitude']) && isset($suggestMarket['longitude'])) {
            $suggestMarket['location'] = \DB::raw('POINT('.$suggestMarket['latitude'].', '.$suggestMarket['longitude'].')');
        }
        
        return \App\Models\SuggestionMarket::create($suggestMarket);
    }
}
