<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MarketService;
use Validator;
use Input;

class MarketsController extends Controller
{
    public function nearBy(Request $request)
    {
        $validationRules = array(
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors());
        }

        $markets = (new MarketService())->nearBy($request->get('latitude'), $request->get('longitude'));
        return $this->getSuccResponse($markets, count($markets));
    }


    public function suggestMarket(Request $request)
    {
        $user = \Auth::user();

        $validationRules = array(
            'name' => 'required|min:2|max:25',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'mobile' => 'digits_between:7,15',
            'phone' => 'digits_between:7,15',
        );

        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors());
        }
    
        $market = (new MarketService())->createSuggestionMarket($request->all(), $user->id);
        return $this->getSuccResponse($market);
    }
}