<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getResponse($obj,$itemsCount=null,$code=200) {

        $res = new \App\Models\StatusResponse();
        $res->status = true;
        $res->validation = null;
        $res->data = $obj;
        $res->itemsCount = $itemsCount;
        return \Illuminate\Support\Facades\Response::json($res,$code);
    }
    
    public static function getErrorResponse($obj,$itemsCount=null,$code=200) {
        $res = new \App\Models\StatusResponse();
        $res->status = false;
        $res->data = null;
        $res->validation = $obj;
        $res->itemsCount = $itemsCount;
        return \Illuminate\Support\Facades\Response::json($res,$code);
    }

    public static function getSuccResponse($obj,$itemsCount=null,$code=200) {
        $res = new \App\Models\StatusResponse();
        $res->status = true;
        $res->data = $obj;
        $res->validation = null;
        $res->itemsCount = $itemsCount;
        return \Illuminate\Support\Facades\Response::json($res,$code);
    }
}
