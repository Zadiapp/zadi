<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\MarketService;
use Validator;
use Input;
use JWTAuth;

class MarketsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    
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
        return $this->getSuccResponse($markets);
    }
}
