<?php

namespace App\Services;

class CategoryService{

    function getCategories($pageIndex, $pageSize) {
        $categories = \App\Models\Category::where('status', \Config::get('constants.categoryStatus.active'));

        $totalCount = $categories->count();
        $data = $categories->skip(($pageIndex-1)*$pageSize)->take($pageSize)->get();

        return ['data'=>$data , 'total' => $totalCount];
    }
}
