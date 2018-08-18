<?php

namespace App\Services;

class MarketService{

    public function nearBy($lat, $lng) {
        $config = \App\Models\AppConfig::select('distance')->first(); 
        $markets = \App\Models\Market::having('distance', '<', $config->distance)
        ->orderBy('distance')
        ->get([\DB::raw('markets.id AS id, name, email, opening_hour, mobile, phone,
        address, ST_X(location) AS latitude,  ST_Y(location) AS longitude,
        delivery_speed, accuracy, min_charge, 
        IF(logo IS NULL, "'.url('images/markets/default.jpg').'", CONCAT("'.url('/').'", logo)) as logo ,
        IF(cover_photo IS NULL, "'.url('images/markets/cover_photo_default.jpg').'", CONCAT("'.url('images/markets/').'", cover_photo)) as cover_photo , (
        6371 * acos (
        cos ( radians('.$lat.') )
        * cos( radians( ST_X(location) ) )
        * cos( radians( ST_Y(location) ) - radians('.$lng.') )
        + sin ( radians('.$lat.') )
        * sin( radians( ST_X(location) ) )
      )
     ) AS distance')]);
     
     $markets = $markets->map(function($item, $key) {
         $item->payments = \App\Models\PaymentMethod::where('market_id', $item->id)->pluck('payment_method_id');
         return $item;
     });
    
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

    public function home($marketId) {
        $home = new \stdClass(); 
        $home->categories = [];
        $home->popular = [];
        $home->recent = [];
        $home->top_search = [];
        $home->offers = [];
        $itemService = new ItemService();
        $categoryService = new CategoryService();

        $firstFiveCategory = $categoryService->getMarketCategories($marketId, 1, 10);
        if(isset($firstFiveCategory['data'])) {
            $firstFiveCategory['data']->map(function($item, $key) use ($itemService, $marketId) {
                $item->items = $itemService->getMarketCategoryItems($marketId, $item->category_id, 1, 5)['data'];
                return $item;
            });
            $home->categories = $firstFiveCategory['data'];
        }
        
        $popularItems = $itemService->getPopularItems($marketId, 1, 10);

        if(isset($popularItems['data'])) {
            $home->popular = $popularItems['data'];
        }
        
        $home->recent = $itemService->getRecentItems($marketId, 1, 10);
        
        return $home;
    }
}
