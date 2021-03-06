<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Validator;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['registerGuest']]);
    }
    
    public function registerGuest(Request $request)
    {
        $validationRules = array(
            'device_id' => 'required',
            'language' => 'required|in:en,ar',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        );

        $request->merge(array_map('trim', $request->all()));
        
        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }

        $guest = (new UserService())->createGuest($request);
        return $this->getSuccResponse(JWTAuth::fromUser($guest));
    }
}
