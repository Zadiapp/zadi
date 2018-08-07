<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
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

        $categories = (new CategoryService())->getCategories($marketId, $pageIndex, $pageSize);
        return $this->getSuccResponse($categories['data'], $categories['total']);
    }
}
