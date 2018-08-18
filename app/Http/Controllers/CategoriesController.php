<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ItemService;
use Validator;

class CategoriesController extends Controller
{
    public function get($marketId, $pageIndex = 1,$pageSize = 20)
    {
        $validationRules = array(
            'market_id' => 'required|exists:markets,id',
        );

        $validator = Validator::make(['market_id' => $marketId], $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }

        $categories = (new CategoryService())->getMarketCategories($marketId, $pageIndex, $pageSize);
        return $this->getSuccResponse($categories['data'], $categories['total']);
    }

    public function getItems($marketId, $categoryId, $pageIndex = 1,$pageSize = 20)
    {
        $validationRules = array(
            'market_id' => 'required|exists:markets,id',
            'category_id' => 'required|exists:categories,id',
        );

        $validator = Validator::make(['market_id' => $marketId, 'category_id' => $categoryId], $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }

        $items = (new ItemService())->getMarketCategoryItems($marketId, $categoryId, $pageIndex, $pageSize);
        return $this->getSuccResponse($items['data'], $items['total']);
    }
}
