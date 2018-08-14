<?php

namespace App\Services;

class ItemService{

    function getMarketItems($marketId, $pageIndex, $pageSize) {
        $items = \App\Models\Item::where('items.status', \Config::get('constants.categoryStatus.active'))
            ->join('items_markets', 'items.id', '=', 'items_markets.item_id')
            ->where('items_markets.market_id', $marketId)
            ->where('items_markets.status', \Config::get('constants.categoryStatus.active'));

        $totalCount = $items->count();
        $data = $items->skip(($pageIndex-1)*$pageSize)->take($pageSize)
        ->get(array('item_id', 'name', 'name_ar', 'image', 'price'));

        return ['data'=>$data , 'total' => $totalCount];
    }
}
