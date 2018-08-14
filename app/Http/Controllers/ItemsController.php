<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ItemService;
use Validator;

class ItemsController extends Controller
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

        $items = (new ItemService())->getMarketItems($marketId, $pageIndex, $pageSize);
        return $this->getSuccResponse($items['data'], $items['total']);
    }
}
