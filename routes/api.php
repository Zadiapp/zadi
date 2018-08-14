<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register-guest', 'AuthController@registerGuest');

Route::group(['prefix' => 'markets','middleware' => ['jwt.auth']],  function () {
    Route::get('nearby', 'MarketsController@nearBy');
    Route::post('suggest', 'MarketsController@suggestMarket');
    Route::get('announcement/{market_id}', 'AnnouncementController@get');
    Route::get('categories/{market_id}/{pageIndex?}/{pageSize?}', 'CategoriesController@get');
    Route::get('items/{market_id}/{pageIndex?}/{pageSize?}', 'ItemsController@get');
    Route::get('popular-items/{market_id}/{pageIndex?}/{pageSize?}', 'ItemsController@getPopularItems');

});

