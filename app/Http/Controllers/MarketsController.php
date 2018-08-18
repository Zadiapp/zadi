<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MarketService;
use Validator;

class MarketsController extends Controller
{
    public function home($marketId)
    {
        $validationRules = array(
            'market_id' => 'required|exists:markets,id',
        );

        $validator = Validator::make(['market_id' => $marketId], $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }

        $market = new MarketService();

        return $this->getSuccResponse($market->home($marketId));
    }

    public function nearBy(Request $request)
    {
        $validationRules = array(
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }

        $markets = (new MarketService())->nearBy($request->get('latitude'), $request->get('longitude'));
        return $this->getSuccResponse($markets, count($markets));
    }


    public function suggestMarket(Request $request)
    {
        $user = \Auth::user();

        $validationRules = array(
            'name' => 'required|min:2|max:25',
            'address' => 'sometimes|required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'mobile' => 'sometimes|required|digits_between:7,15',
            'phone' => 'sometimes|required|digits_between:7,15',
            'note' => 'sometimes|required'
        );

        $request->merge(array_map('trim', $request->all()));

        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }
    
        $market = (new MarketService())->createSuggestionMarket($request->all(), $user->id);
        return $this->getSuccResponse($market);
    }
}
