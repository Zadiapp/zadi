<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AnnouncementService;
use Validator;

class AnnouncementController extends Controller
{
    public function get($market_id)
    {
        $validationRules = array(
            'market_id' => 'required|exists:markets,id',
        );

        $validator = Validator::make(['market_id' => $market_id], $validationRules);
        if ($validator->fails()) {
            return $this->GetErrorResponse($validator->errors(), null, 400);
        }

        $announcement = (new AnnouncementService())->getMarketAnnouncement($market_id);
        return $this->getSuccResponse($announcement, 1);
    }
}
