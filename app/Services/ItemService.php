<?php

namespace App\Services;

class ItemService{

    function getMarketItems($marketId, $pageIndex, $pageSize) {
        $items = \App\Models\Item::where('items.status', \Config::get('constants.categoryStatus.active'))
            ->join('items_markets', 'items.id', '=', 'items_markets.item_id')
            ->join('categories', 'items.category_id', 'categories.id')
            ->join('size_types', 'items.size_type', 'size_types.id')
            ->where('items_markets.market_id', $marketId)
            ->where('items_markets.status', \Config::get('constants.categoryStatus.active'));

        $totalCount = $items->count();
        $data = $items->skip(($pageIndex-1)*$pageSize)->take($pageSize)
        ->get(
            array(
                'item_id', 'items.name AS item_name', 'items.name_ar AS item_name_ar', 'items.image AS item_image',
                'price', 'market_id', 'category_id', 'categories.name AS category_name',
                'categories.name_ar AS category_name_ar', 'size', 'size_types.title AS size_title',
                'size_types.title_ar AS size_title_ar', 'size_types.unit AS size_unit', 'size_types.unit_ar AS size_unit_ar'
            )
        );

        return ['data'=>$data , 'total' => $totalCount];
    }

    function getPopularItems($marketId, $pageIndex, $pageSize) {
        $items = \App\Models\Item::where('items.status', \Config::get('constants.categoryStatus.active'))
            ->join('items_markets', 'items.id', '=', 'items_markets.item_id')
            ->where('items_markets.market_id', $marketId)
            ->where('items_markets.popular', 1)
            ->where('items_markets.status', \Config::get('constants.categoryStatus.active'));

        $totalCount = $items->count();
        $data = $items->skip(($pageIndex-1)*$pageSize)->take($pageSize)
        ->get(array('item_id', 'name', 'name_ar', 'image', 'price'));

        return ['data'=>$data , 'total' => $totalCount];
    }
}
