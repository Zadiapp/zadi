<?php

namespace App\Services;

class CategoryService{

    function getMarketCategories($marketId, $pageIndex, $pageSize) {
        $categories = \App\Models\Category::where('categories.status', \Config::get('constants.categoryStatus.active'))
            ->join('categories_markets', 'categories.id', '=', 'categories_markets.category_id')
            ->where('categories_markets.market_id', $marketId)
            ->where('categories_markets.status', \Config::get('constants.categoryStatus.active'));

        $totalCount = $categories->count();
        $data = $categories->skip(($pageIndex-1)*$pageSize)->take($pageSize)->get(array('category_id', 'name', 'name_ar', 'description', 'description_ar', 'image'));

        return ['data'=>$data , 'total' => $totalCount];
    }
}
